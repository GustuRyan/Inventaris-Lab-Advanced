<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Recommend;
use App\Models\Room;
use App\Models\RoomDetail;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class RoomController extends Controller
{
    public function faculty($faculty)
    {
        $faculty_rooms = Room::where('faculty_name', $faculty)->get();

        $total = $faculty_rooms->count();

        return view('user.pages.faculty', compact('faculty_rooms', 'faculty', 'total'));
    }

    public function major($major, $filter)
    {
        $room = Room::findOrFail($major);
        $list_rooms = $room->where('faculty_name', $room->faculty_name);
        $details = RoomDetail::findOrFail($major);

        $recommends = Cart::where('user_id', auth()->id())->get();
        $relations = collect();
        $overs = collect();

        foreach ($recommends as $recommend) {
            if ($filter == 'material') {
                $details = $details->where('material_id', '!=', 0)->where('room_id', $major);
                if ($recommend->material_id != 0) {
                    $overs = Recommend::where('material_id', $recommend->material_id)->get();
                }

                if ($overs != null) {
                    $relations = $relations->merge($overs);
                }
            } else {
                $details = $details->where('tool_id', '!=', 0)->where('room_id', $major);
                if ($recommend->tool_id != 0) {
                    $overs = Recommend::where('tool_id', $recommend->tool_id)->get();
                }

                if ($overs != null) {
                    $relations = $relations->merge($overs);
                }
            }
        }

        $current = 'first';
        $recommendations = collect();

        foreach ($relations as $relation) {
            if ($relation->relation != $current) {
                if ($filter == 'material') {
                    $recommendation = Recommend::where('relation', $relation->relation)->where('material_id', '!=', 0)
                        ->inRandomOrder()
                        ->take(1)
                        ->get();

                    $recommendations = $recommendations->merge($recommendation);
                } else {
                    $recommendation = Recommend::where('relation', $relation->relation)->where('tool_id', '!=', 0)
                        ->inRandomOrder()
                        ->take(1)
                        ->get();

                    $recommendations = $recommendations->merge($recommendation);
                }
            }

            $current = $relation->relation;
        }

        $details = $details->paginate(8);

        return view('user.pages.tools', compact('room', 'details', 'list_rooms', 'filter', 'major', 'recommendations', 'recommends'));
    }

    public function generatePDF($roomId)
    {
        // Ambil data room berdasarkan ID
        $room = Room::findOrFail($roomId);

        // Ambil materials dan tools berdasarkan room_id
        $materials = RoomDetail::where('material_id', '!=', 0)->where('room_id', $roomId)->get();
        $tools = RoomDetail::where('tool_id', '!=', 0)->where('room_id', $roomId)->get();

        // Load view menggunakan mPDF
        $html = view('user.components.generate-pdf.room', compact('room', 'materials', 'tools'))->render();

        // Setup mPDF
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);

        // Download file PDF dengan nama laravel_demo.pdf
        $mpdf->Output('detail_'. $room->room_name . '_' . $room->major_name .'.pdf', \Mpdf\Output\Destination::DOWNLOAD);

        // Redirect kembali ke halaman sebelumnya
        return redirect()->back();
    }


}

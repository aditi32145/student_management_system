@extends('layouts.student')


@section('content')


<style>
/* Layout */
.container {
    margin-left: 15em;
    padding: 10px;
    font-family: Arial, sans-serif;
}


.page-header h2 {
    margin: 0;
    color: #7a0000;
}
.page-header p {
    margin-top: 5px;
    color: #555;
}


.card {
    background: #fff;
    border-radius: 6px;
    box-shadow: 0 0 8px rgba(0,0,0,0.05);
}


/* Table */
table {
    width: 100%;
    border-collapse: collapse;
    background: #fff;
}


table th,
table td {
    border: 1px solid #ddd;
    padding: 10px;
    font-size: 14px;
    text-align: left;
}


table th {
    background: #7a0000;
    color: #fff;
}


table tr:nth-child(even) {
    background: #f9f9f9;
}


.no-data {
    text-align: center;
    color: #777;
    padding: 15px;
}


/* Links */
.action-link {
    color: #7a0000;
    font-weight: bold;
    cursor: pointer;
    text-decoration: underline;
}


/* Modal */
.modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.6);
    display: none;
    z-index: 1000;
}


.modal-box {
    background: #fff;
    width: 20%;
    margin: 8% auto;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 15px rgba(0,0,0,0.2);
}


.modal-box h3 {
    margin-top: 0;
    color: #7a0000;
}


.modal-box p {
    margin: 15px 0;
    line-height: 1.6;
}


.modal-close {
    background: #7a0000;
    color: #fff;
    padding: 6px 14px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
/* Bottom section */
.section-title {
    margin: 25px 0 10px;
    color: #7a0000;
}


/* Status badge */
.status {
    padding: 4px 10px;
    border-radius: 12px;
    font-size: 12px;
    font-weight: bold;
    text-transform: capitalize;
}
.status.pending {
    background: #fff3cd;
    color: #856404;
}
.status.accepted {
    background: #d4edda;
    color: #155724;
}
.status.rejected {
    background: #f8d7da;
    color: #721c24;
}


/* Upload form inline */
.upload-form {
    display: flex;
    gap: 6px;
    align-items: center;
}
.upload-form input[type="file"] {
    font-size: 12px;
}
.upload-btn {
    background: #7a0000;
    color: #fff;
    border: none;
    padding: 5px 10px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 13px;
}


.locked {
    color: #999;
    font-weight: bold;
}


.second_table{
    margin-left: 16em;
    width:78%;
    margin-bottom: 50px;
}


</style>


<div class="container">


    {{-- Header --}}
    <div class="page-header">
        <h2>📘 Continuous Assessment Activity</h2>
        <p><strong>Course:</strong> {{ strtoupper($student->degree) }}</p>
    </div>


    {{-- CA Table --}}
    <div class="card">
        <h4>Assessment List</h4>


        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Subject</th>
                    <th>Course</th>
                    <th>CA Type</th>
                    <th>Upload Type</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Content</th>
                    <th>Instructions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($ca_list as $ca)
                <tr>
                    <td>{{ $ca->id }}</td>
                    <td>{{ $ca->subject }}</td>
                    <td>{{ $ca->course }}</td>
                    <td>{{ $ca->ca_type }}</td>
                    <td>{{ ucfirst($ca->upload_type) }}</td>
                    <td>{{ $ca->start_date }}</td>
                    <td>{{ $ca->end_date }}</td>


                    {{-- Content --}}
                    <td>
                        @if($ca->upload_type == 'pdf' && $ca->pdf_file)
                            <a class="action-link" href="{{ asset('storage/' . $ca->pdf_file) }}" target="_blank">
                                View PDF
                            </a>
                        @elseif($ca->upload_type == 'text' && $ca->text_content)
                            <span class="action-link"
                                  onclick="openTextModal(`{{ $ca->text_content }}`)">
                                View Text
                            </span>
                        @else
                            —
                        @endif
                    </td>


                    {{-- Instructions --}}
                    <td>
                        @if($ca->instructions)
                            <span class="action-link"
                                  onclick="openInstructionModal(`{{ $ca->instructions }}`)">
                                View
                            </span>
                        @else
                            —
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="no-data">
                        No CA available for your course.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>


</div>


{{-- TEXT MODAL --}}
<div id="textModal" class="modal-overlay">
    <div class="modal-box">
        <h3>Text Content</h3>
        <p id="textContent"></p>
        <button class="modal-close" onclick="closeTextModal()">Close</button>
    </div>
</div>


{{-- INSTRUCTION MODAL --}}
<div id="instructionModal" class="modal-overlay">
    <div class="modal-box">
        <h3>Instructions</h3>
        <p id="instructionContent"></p>
        <button class="modal-close" onclick="closeInstructionModal()">Close</button>
    </div>
</div>


<div class="card">
    <h4 class="section-title">📤 Your CA Submissions</h4>


    <table class="second_table">
        <thead>
            <tr>
                <th>Subject</th>
                <th>CA Type</th>
                <th>Start</th>
                <th>End</th>
                <th>Uploaded Date</th>
                <th>Your PDF</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>


        <tbody>


@foreach($ca_list as $ca)


@php
    $today = \Carbon\Carbon::today();
    $start = \Carbon\Carbon::parse($ca->start_date);
    $end = \Carbon\Carbon::parse($ca->end_date);


    // hide rows outside date window
    if($today->lt($start) || $today->gt($end)) continue;


    $sub = \App\Models\StudentCASubmission::where('student_id',$student->id)
            ->where('ca_upload_id',$ca->id)->first();
@endphp


<tr>
<td>{{ $ca->subject }}</td>
<td>{{ strtoupper($ca->ca_type) }}</td>
<td>{{ $ca->start_date }}</td>
<td>{{ $ca->end_date }}</td>


<td>{{ $sub->uploaded_at ?? '—' }}</td>


<td>
@if($sub && $sub->pdf_file)
    <a class="action-link" href="{{ asset('storage/'.$sub->pdf_file) }}" target="_blank">
        View
    </a>
@else
    —
@endif
</td>


<td>
    @if($sub)
        @if($sub->status)
            <span class="status {{ $sub->status }}">
                {{ $sub->status }}
            </span>
        @else
            —
        @endif
    @else
        —
    @endif
</td>




<td>


{{-- upload allowed if:
     1) inside date
     2) not accepted
     3) (editable yes) or (not uploaded yet)
--}}
@if(
    (!$sub || $sub->status!='accepted') &&
    ($ca->editable || !$sub)
)


<form action="{{ route('student.ca.submit',$ca->id) }}"
      method="POST" enctype="multipart/form-data">


@csrf
<input type="file" name="pdf_file" accept="application/pdf" required>
<button type="submit">Upload</button>


</form>


@else
Locked
@endif
</div>


</td>
</tr>
@endforeach
</tbody>
</table>




<script>
function openTextModal(text){
    document.getElementById('textContent').innerText = text;
    document.getElementById('textModal').style.display = 'block';
}
function closeTextModal(){
    document.getElementById('textModal').style.display = 'none';
}


function openInstructionModal(text){
    document.getElementById('instructionContent').innerText = text;
    document.getElementById('instructionModal').style.display = 'block';
}
function closeInstructionModal(){
    document.getElementById('instructionModal').style.display = 'none';
}
</script>


@endsection

@extends('layouts.teacher')


@section('content')


<style>
/* ===== Page ===== */
.container{
    margin:-40px 0 0 15em;
    padding:20px;
    font-family:Arial, sans-serif;
}
.header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px;
}


/* ===== Buttons ===== */
.btn{
    background:#7a0000;
    color:#fff;
    border:none;
    padding:8px 14px;
    border-radius:4px;
    cursor:pointer;
    font-size:14px;
}
.btn:hover{background:#5c0000}
.btn-secondary{background:#6c757d}
.btn-danger{background:#dc3545}


/* ===== Table ===== */
table{
    width:100%;
    border-collapse:collapse;
    background:#fff;
}
th,td{
    border:1px solid #ddd;
    padding:10px;
    font-size:14px;
}
th{
    background:#7a0000;
    color:#fff;
}
tr:nth-child(even){background:#f9f9f9}


/* ===== Modal ===== */
.modal{
    display:none;
    position:fixed;
    inset:0;
    background:rgba(0,0,0,.5);
    z-index:999;
    margin-top: 30px;
}
.modal-content{
    background:#fff;
    width:420px;
    max-height:65vh;
    overflow-y:auto;
    margin:60px auto;
    padding:20px;
    border-radius:6px;
}
.modal h3{margin-bottom:15px}


.modal label{
    display:block;
    font-weight:bold;
    margin-top:10px;
}
.modal input,
.modal select,
.modal textarea{
    width:100%;
    padding:6px;
    margin-top:5px;
    font-size:14px;
}


.radio-row{
    display:flex;
    gap:15px;
    margin-top:5px;
}


.modal-actions{
    margin-top:20px;
    display:flex;
    justify-content:flex-end;
    gap:10px;
}


.success-msg{
    color:green;
    margin-bottom:10px;
}
</style>


<div class="container">


    <div class="header">
        <h2>📚 CA Upload Panel</h2>
        <button class="btn" onclick="openCreate()">+ Import CA</button>
    </div>


    @if(session('success'))
        <p class="success-msg">{{ session('success') }}</p>
    @endif


    <table>
        <tr>
            <th>Subject</th>
            <th>Course</th>
            <th>CA</th>
            <th>Start</th>
            <th>End</th>
            <th>Content</th>
            <th>Instructions</th>
            <th>Editable</th>
            <th>Actions</th>
        </tr>


        @foreach($uploads as $u)
        <tr>
            <td>{{ $u->subject }}</td>
            <td>{{ $u->course }}</td>
            <td>{{ strtoupper($u->ca_type) }}</td>
            <td>{{ $u->start_date }}</td>
            <td>{{ $u->end_date }}</td>


            <td>
                @if($u->upload_type=='pdf')
                    <button class="btn btn-secondary" onclick="openPdf('{{ asset('storage/'.$u->pdf_file) }}')">View PDF</button>
                @else
                    <button class="btn btn-secondary" onclick="openText(`{!! nl2br(e($u->text_content)) !!}`)">View Text</button>
                @endif
            </td>


            <td>
                <button class="btn btn-secondary" onclick="openInstruction(`{!! nl2br(e($u->instructions)) !!}`)">View</button>
            </td>


            <td>{{ $u->editable ? 'Yes' : 'No' }}</td>


            <td>
                <button class="btn" onclick="loadEdit({{ $u->id }})">Edit</button>


                <form method="POST" action="{{ route('teacher.ca.notify',$u->id) }}" style="display:inline">
                    @csrf
                    <button class="btn btn-secondary">Notify</button>
                </form>


                <form method="POST" action="{{ route('teacher.ca.delete',$u->id) }}" style="display:inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>


    <br><br>


<h3>📥 Student CA Submissions</h3>


<table>
    <tr>
        <th>Student ID</th>
        <th>Subject</th>
        <th>CA Type</th>
        <th>Uploaded Date</th>
        <th>PDF</th>
        <th>Status</th>
        <th>Change Status</th>
        <th>Delete</th>
    </tr>


@foreach($submissions as $s)


@php
    $student = \App\Models\Student::find($s->student_id);
    $ca = \App\Models\CAUpload::find($s->ca_upload_id);
@endphp


<tr>
    <td>{{ $s->student_id }}</td>


    <td>{{ $ca->subject ?? '—' }}</td>


    <td>{{ strtoupper($ca->ca_type ?? '') }}</td>


    <td>{{ $s->uploaded_at }}</td>


    <td>
        @if($s->pdf_file)
            <a href="{{ asset('storage/'.$s->pdf_file) }}" target="_blank">View</a>
        @else
            —
        @endif
    </td>


    <td>
        <span style="font-weight:bold">
            {{ ucfirst($s->status ?? 'pending') }}
        </span>
    </td>


    <td>
        <form action="{{ route('teacher.submission.status',$s->id) }}" method="POST">
            @csrf
            <select name="status" onchange="this.form.submit()">
                <option value="pending"  {{ $s->status=='pending'?'selected':'' }}>Pending</option>
                <option value="accepted" {{ $s->status=='accepted'?'selected':'' }}>Accepted</option>
                <option value="rejected" {{ $s->status=='rejected'?'selected':'' }}>Rejected</option>
            </select>
        </form>
    </td>
 
    <td>
        <form action="{{ route('teacher.submission.delete',$s->id) }}" method="POST">
            @csrf @method('DELETE')
            <button class="btn btn-danger">Delete</button>
        </form>
    </td>
</tr>


@endforeach


</table>


</div>


{{-- CREATE / EDIT MODAL --}}
<div class="modal" id="caModal">
    <div class="modal-content">
        <h3 id="modalTitle">📤 Import CA</h3>


        <form id="caForm" method="POST" action="{{ route('teacher.ca.store') }}" enctype="multipart/form-data">
            @csrf


            <label>Subject</label>
            <input type="text" name="subject" required>


            <label>Course</label>
            <select name="course">
                <option>BCA</option>
                <option>BBA</option>
            </select>


            <label>CA Type</label>
            <select name="ca_type">
                <option value="ca1">CA1</option>
                <option value="ca2">CA2</option>
                <option value="ca3">CA3</option>
                <option value="ca4">CA4</option>
            </select>


            <label>Upload Type</label>
            <div class="radio-row">
                <label><input type="radio" name="upload_type" value="text" onclick="showText()"> Text</label>
                <label><input type="radio" name="upload_type" value="pdf" onclick="showPdf()"> PDF</label>
            </div>


            <div id="textBox" style="display:none">
                <label>Text Content</label>
                <textarea name="text_content"></textarea>
            </div>


            <div id="pdfBox" style="display:none">
                <label>PDF File</label>
                <input type="file" name="pdf_file" accept="application/pdf">
            </div>


            <label>Instructions</label>
            <textarea name="instructions"></textarea>


            <label>Allow Edit?</label>
            <div class="radio-row">
                <label><input type="radio" name="editable" value="1"> Yes</label>
                <label><input type="radio" name="editable" value="0"> No</label>
            </div>


            <label>Start Date</label>
            <input type="date" name="start_date" required>


            <label>End Date</label>
            <input type="date" name="end_date" required>


            <div class="modal-actions">
                <button type="button" class="btn btn-secondary" onclick="closeModal()">Cancel</button>
                <button type="submit" class="btn">Save</button>
            </div>
        </form>
    </div>
</div>


{{-- VIEW MODALS --}}
<div class="modal" id="textModal">
    <div class="modal-content">
        <h3>📄 Text</h3>
        <div id="textContent"></div>
        <div class="modal-actions">
            <button class="btn btn-secondary" onclick="closeText()">Close</button>
        </div>
    </div>
</div>


<div class="modal" id="instructionModal">
    <div class="modal-content">
        <h3>📝 Instructions</h3>
        <div id="instructionContent"></div>
        <div class="modal-actions">
            <button class="btn btn-secondary" onclick="closeInstruction()">Close</button>
        </div>
    </div>
</div>


<div class="modal" id="pdfModal">
    <div class="modal-content">
        <h3>📑 PDF</h3>
        <iframe id="pdfFrame" width="100%" height="500"></iframe>
        <div class="modal-actions">
            <button class="btn btn-secondary" onclick="closePdf()">Close</button>
        </div>
    </div>
</div>


<script>
const caModal = document.getElementById('caModal');
const caForm  = document.getElementById('caForm');


function openCreate(){
    caForm.reset();
    caForm.action = "{{ route('teacher.ca.store') }}";
    document.getElementById('modalTitle').innerText = "📤 Import CA";
    hideBoth();
    caModal.style.display='block';
}


function closeModal(){ caModal.style.display='none'; }


function hideBoth(){
    document.getElementById('textBox').style.display='none';
    document.getElementById('pdfBox').style.display='none';
}


function showText(){ hideBoth(); document.getElementById('textBox').style.display='block'; }
function showPdf(){ hideBoth(); document.getElementById('pdfBox').style.display='block'; }


function loadEdit(id){
    fetch(`/teacher/ca-upload/${id}/edit`)
    .then(res => res.json())
    .then(openEdit);
}


function openEdit(d){
    openCreate();
    document.getElementById('modalTitle').innerText="✏️ Edit CA Upload";
    caForm.action=`/teacher/ca-upload/${d.id}/update`;


    caForm.subject.value=d.subject;
    caForm.course.value=d.course;
    caForm.ca_type.value=d.ca_type;
    caForm.instructions.value=d.instructions ?? '';
    caForm.start_date.value=d.start_date;
    caForm.end_date.value=d.end_date;


    document.querySelector(`input[name="editable"][value="${d.editable?1:0}"]`).checked=true;


    if(d.upload_type==='text'){
        document.querySelector('input[value="text"]').checked=true;
        showText();
        caForm.text_content.value=d.text_content ?? '';
    }else{
        document.querySelector('input[value="pdf"]').checked=true;
        showPdf();
    }
}

/* View Modals */
function openText(t){ textContent.innerHTML=t; textModal.style.display='block'; }
function closeText(){ textModal.style.display='none'; }


function openInstruction(t){ instructionContent.innerHTML=t; instructionModal.style.display='block'; }
function closeInstruction(){ instructionModal.style.display='none'; }


function openPdf(u){ pdfFrame.src=u; pdfModal.style.display='block'; }
function closePdf(){ pdfModal.style.display='none'; }
</script>

@endsection

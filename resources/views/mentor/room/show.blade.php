@extends('layout.app')

@section('konten')
<div class="container py-4">
    <!-- Header Room -->
    <div class="card mb-4">
        <div class="card-body">
            <h2 class="mb-2">{{ $room->nama_room }}</h2>
            <p class="text-muted mb-0">{{ $room->deskripsi }}</p>
        </div>
    </div>

    <div class="row">
        <!-- Kolom Kiri -->
        <div class="col-md-8">
            <!-- Form Tambah Task -->
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Tambah Task Baru</h5>
                </div>
                <div class="card-body">
                    <form id="taskForm">
                        @csrf
                        <div class="mb-3">
                            <label for="taskJudul" class="form-label">Judul Task</label>
                            <input type="text" class="form-control" id="taskJudul" name="judul" required>
                        </div>
                        <div class="mb-3">
                            <label for="taskDeskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="taskDeskripsi" name="deskripsi" rows="4" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="taskDeadline" class="form-label">Deadline</label>
                            <input type="datetime-local" class="form-control" id="taskDeadline" name="deadline" required>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-plus-circle"></i> Tambah Task
                        </button>
                    </form>
                </div>
            </div>

            <!-- List Task -->
            <div class="card">
                <div class="card-header bg-secondary text-white">
                    <h5 class="mb-0">Daftar Task</h5>
                </div>
                <div class="card-body">
                    <div id="taskList">
                        <div class="text-center py-4">
                            <div class="spinner-border" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kolom Kanan -->
        <div class="col-md-4">
            <!-- Materi Terkait -->
            <div class="card mb-4">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">Materi Terkait</h5>
                </div>
                <div class="card-body">
                    @if($room->materis->count() > 0)
                        <ul class="list-group list-group-flush">
                            @foreach($room->materis as $materi)
                            <li class="list-group-item px-0">
                                <div class="d-flex align-items-start">
                                    <i class="bi bi-file-earmark-text me-2 mt-1"></i>
                                    <div>
                                        <h6 class="mb-1">{{ $materi->judul }}</h6>
                                        <small class="text-muted">{{ $materi->getFileType() ?? 'Dokumen' }}</small>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-muted mb-0">Belum ada materi</p>
                    @endif
                </div>
            </div>

            <!-- Peserta -->
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">Peserta Room (<span id="participantCount">0</span>)</h5>
                </div>
                <div class="card-body">
                    <div id="participantList">
                        <div class="text-center py-3">
                            <div class="spinner-border spinner-border-sm" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail Task -->
<div class="modal fade" id="taskDetailModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="taskDetailJudul"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <strong>Deskripsi:</strong>
                    <p id="taskDetailDeskripsi"></p>
                </div>
                <div class="mb-3">
                    <strong>Deadline:</strong>
                    <p id="taskDetailDeadline"></p>
                </div>
                <div>
                    <strong>Submissions (<span id="submissionCount">0</span>):</strong>
                    <div id="submissionList" class="mt-2"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
<style>
    .task-card {
        border-left: 4px solid #0d6efd;
        transition: all 0.3s;
    }
    .task-card:hover {
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        transform: translateY(-2px);
    }
    .participant-item {
        padding: 10px;
        border-bottom: 1px solid #e9ecef;
    }
    .participant-item:last-child {
        border-bottom: none;
    }
    .badge-submission {
        font-size: 0.75rem;
    }
</style>
@endpush

@push('scripts')
<script>
$(document).ready(function() {
    const roomId = {{ $room->room_id }};
    
    // Load data awal
    loadParticipants();
    loadTasks();
    
    // Submit form task
    $('#taskForm').on('submit', function(e) {
        e.preventDefault();
        
        const formData = {
            _token: '{{ csrf_token() }}',
            judul: $('#taskJudul').val(),
            deskripsi: $('#taskDeskripsi').val(),
            deadline: $('#taskDeadline').val()
        };
        
        $.ajax({
            url: `/mentor/rooms/${roomId}/tasks`,
            method: 'POST',
            data: formData,
            beforeSend: function() {
                $('button[type="submit"]').prop('disabled', true).html('<span class="spinner-border spinner-border-sm"></span> Loading...');
            },
            success: function(response) {
                // Reset form
                $('#taskForm')[0].reset();
                
                // Tampilkan notifikasi
                showNotification('success', response.message);
                
                // Reload task list
                loadTasks();
            },
            error: function(xhr) {
                let errorMsg = 'Terjadi kesalahan';
                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    errorMsg = Object.values(xhr.responseJSON.errors).flat().join('<br>');
                }
                showNotification('error', errorMsg);
            },
            complete: function() {
                $('button[type="submit"]').prop('disabled', false).html('<i class="bi bi-plus-circle"></i> Tambah Task');
            }
        });
    });
    
    // Load participants
    function loadParticipants() {
        $.ajax({
            url: `/mentor/rooms/${roomId}/participants`,
            method: 'GET',
            success: function(participants) {
                $('#participantCount').text(participants.length);
                
                if (participants.length === 0) {
                    $('#participantList').html('<p class="text-muted mb-0">Belum ada peserta</p>');
                    return;
                }
                
                let html = '';
                participants.forEach(function(participant) {
                    html += `
                        <div class="participant-item">
                            <div class="d-flex align-items-center">
                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; flex-shrink: 0;">
                                    <strong>${participant.nama.charAt(0).toUpperCase()}</strong>
                                </div>
                                <div class="ms-3">
                                    <h6 class="mb-0">${participant.nama}</h6>
                                    <small class="text-muted">@${participant.username}</small><br>
                                    <small class="text-muted">Bergabung: ${participant.joined_at}</small>
                                </div>
                            </div>
                        </div>
                    `;
                });
                
                $('#participantList').html(html);
            },
            error: function() {
                $('#participantList').html('<p class="text-danger mb-0">Gagal memuat peserta</p>');
            }
        });
    }
    
    // Load tasks
    function loadTasks() {
        $.ajax({
            url: `/mentor/rooms/${roomId}/tasks`,
            method: 'GET',
            success: function(tasks) {
                if (tasks.length === 0) {
                    $('#taskList').html('<p class="text-muted mb-0">Belum ada task</p>');
                    return;
                }
                
                let html = '';
                tasks.forEach(function(task) {
                    const now = new Date();
                    const deadline = new Date(task.deadline);
                    const isOverdue = deadline < now;
                    
                    html += `
                        <div class="card task-card mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h5 class="mb-0">${task.judul}</h5>
                                    <span class="badge ${isOverdue ? 'bg-danger' : 'bg-success'} badge-submission">
                                        ${task.total_submissions} submissions
                                    </span>
                                </div>
                                <p class="text-muted mb-2">${task.deskripsi.substring(0, 100)}${task.deskripsi.length > 100 ? '...' : ''}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">
                                        <i class="bi bi-calendar-event"></i> ${task.deadline}
                                    </small>
                                    <button class="btn btn-sm btn-outline-primary view-task" data-task-id="${task.id}">
                                        <i class="bi bi-eye"></i> Lihat Detail
                                    </button>
                                </div>
                            </div>
                        </div>
                    `;
                });
                
                $('#taskList').html(html);
            },
            error: function() {
                $('#taskList').html('<p class="text-danger mb-0">Gagal memuat task</p>');
            }
        });
    }
    
    // View task detail
    $(document).on('click', '.view-task', function() {
        const taskId = $(this).data('task-id');
        
        $.ajax({
            url: `/mentor/rooms/${roomId}/tasks`,
            method: 'GET',
            success: function(tasks) {
                const task = tasks.find(t => t.id === taskId);
                
                if (task) {
                    $('#taskDetailJudul').text(task.judul);
                    $('#taskDetailDeskripsi').text(task.deskripsi);
                    $('#taskDetailDeadline').text(task.deadline);
                    $('#submissionCount').text(task.total_submissions);
                    
                    if (task.submissions.length === 0) {
                        $('#submissionList').html('<p class="text-muted">Belum ada yang mengumpulkan</p>');
                    } else {
                        let submissionHtml = '<div class="list-group">';
                        task.submissions.forEach(function(submission) {
                            const statusClass = submission.status === 'graded' ? 'success' : 'warning';
                            submissionHtml += `
                                <div class="list-group-item">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="mb-1">${submission.user_nama}</h6>
                                            <small class="text-muted">${submission.submitted_at}</small>
                                        </div>
                                        <span class="badge bg-${statusClass}">${submission.status}</span>
                                    </div>
                                </div>
                            `;
                        });
                        submissionHtml += '</div>';
                        $('#submissionList').html(submissionHtml);
                    }
                    
                    $('#taskDetailModal').modal('show');
                }
            }
        });
    });
    
    // Notification helper
    function showNotification(type, message) {
        const alertClass = type === 'success' ? 'alert-success' : 'alert-danger';
        const icon = type === 'success' ? 'check-circle-fill' : 'exclamation-triangle-fill';
        
        const notification = $(`
            <div class="alert ${alertClass} alert-dismissible fade show position-fixed top-0 end-0 m-3" role="alert" style="z-index: 9999;">
                <i class="bi bi-${icon} me-2"></i>${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        `);
        
        $('body').append(notification);
        
        setTimeout(function() {
            notification.alert('close');
        }, 5000);
    }
});
</script>
@endpush
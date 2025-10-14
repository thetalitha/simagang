<!-- resources/views/peserta/roomlist/join.blade.php -->
<div class="modal fade" id="joinRoomModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title font-weight-bold">Join Room</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form action="{{ route('peserta.roomlist.join') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="room_code">Room Code</label>
                        <input 
                            type="text" 
                            class="form-control form-control-lg text-center" 
                            id="code" 
                            name="code"
                            placeholder="ROOM-XXXX-XXXX"
                            style="letter-spacing: 2px; font-weight: 600;"
                            required
                        >
                        <small class="form-text text-muted">
                            Masukkan kode room yang diberikan oleh mentor
                        </small>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-sign-in-alt mr-2"></i>
                        Join Room
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

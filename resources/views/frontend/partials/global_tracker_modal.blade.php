<!-- Global Tracker Modal -->
<div class="modal fade" id="globalTrackerModal" tabindex="-1" aria-labelledby="globalTrackerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0" style="border-radius: 12px; overflow: hidden; box-shadow: 0 25px 50px -12px rgba(17, 26, 58, 0.25);">
            <div class="modal-header d-flex align-items-center justify-content-between" style="background: #111A3A; color: #ffffff; padding: 1.5rem 2rem; border-bottom: none;">
                <h5 class="modal-title m-0 text-white" id="globalTrackerModalLabel" style="font-weight: 700; font-size: 1.5rem; color: #ffffff !important; display: inline-block;">
                    <i class="fa-solid fa-passport me-2" style="color: #C59A27;"></i> <span style="color: #ffffff;">Track Your Application</span>
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" style="opacity: 0.8;"></button>
            </div>
            <div class="modal-body p-0" style="background: #f8fafc;">
                <!-- Search Form Section -->
                <div style="background: #fff; padding: 2rem; border-bottom: 1px solid #e2e8f0;">
                    <form id="globalTrackerForm" onsubmit="handleGlobalTrack(event)">
                        <div class="input-group" style="box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);">
                            <input type="text" id="globalPassportInput" name="passport_number" class="form-control form-control-lg" placeholder="Enter Passport Number (e.g. A01234567)" required style="border: 2px solid #e2e8f0; border-right: none; text-transform: uppercase; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 1.1rem; padding-left: 1.5rem;">
                            <button class="btn btn-primary px-4" type="submit" id="globalTrackBtn" style="background: #C59A27; border: 2px solid #C59A27; font-family: 'Outfit', sans-serif; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em;">
                                <i class="fa-solid fa-magnifying-glass me-1"></i> Track
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Result Container -->
                <div id="globalTrackerResult" class="p-4" style="display: none;">
                    <!-- Loading Spinner -->
                    <div id="trackerLoading" class="text-center py-5" style="display: none;">
                        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem; color: #C59A27 !important;">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-3 text-muted" style="font-family: 'Plus Jakarta Sans', sans-serif;">Searching for application records...</p>
                    </div>

                    <!-- Error Alert -->
                    <div id="trackerError" class="alert alert-danger" style="display: none; border-radius: 8px; font-family: 'Plus Jakarta Sans', sans-serif;">
                        <i class="fa-solid fa-circle-exclamation me-2"></i> <span id="trackerErrorText"></span>
                    </div>

                    <!-- Result HTML Content -->
                    <div id="trackerContent"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function handleGlobalTrack(e) {
        e.preventDefault();
        const input = document.getElementById('globalPassportInput');
        const btn = document.getElementById('globalTrackBtn');
        const resultContainer = document.getElementById('globalTrackerResult');
        const loading = document.getElementById('trackerLoading');
        const error = document.getElementById('trackerError');
        const content = document.getElementById('trackerContent');
        const passportNum = input.value.trim();

        if(!passportNum) return;

        // UI Reset
        resultContainer.style.display = 'block';
        loading.style.display = 'block';
        error.style.display = 'none';
        content.innerHTML = '';
        btn.disabled = true;
        btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i>';

        fetch('{{ route("apply.track") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json'
            },
            body: JSON.stringify({ passport_number: passportNum })
        })
        .then(response => response.json())
        .then(data => {
            loading.style.display = 'none';
            btn.disabled = false;
            btn.innerHTML = '<i class="fa-solid fa-magnifying-glass me-1"></i> Track';

            if (data.success) {
                content.innerHTML = data.html;
            } else {
                error.style.display = 'block';
                document.getElementById('trackerErrorText').innerText = data.message || 'No record found.';
            }
        })
        .catch(err => {
            loading.style.display = 'none';
            btn.disabled = false;
            btn.innerHTML = '<i class="fa-solid fa-magnifying-glass me-1"></i> Track';
            error.style.display = 'block';
            document.getElementById('trackerErrorText').innerText = 'An error occurred while communicating with the server.';
        });
    }
</script>

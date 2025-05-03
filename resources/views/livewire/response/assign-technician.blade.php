<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign Technician</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .specialist-badge {
            font-size: 0.8rem;
            border-radius: 4px;
            padding: 2px 6px;
            margin-left: 8px;
        }
        .hw-specialist { background-color: #ffcccc; color: #cc0000; }
        .sw-specialist { background-color: #ccffcc; color: #006600; }
        .network-specialist { background-color: #cce0ff; color: #0044cc; }
        .password-specialist { background-color: #ffffcc; color: #999900; }
        .power-specialist { background-color: #ffccff; color: #990099; }
        .general-technician { background-color: #f0f0f0; color: #666666; }
        
        /* Notification styles */
        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            min-width: 300px;
            animation: slideIn 0.5s forwards;
        }
        
        @keyframes slideIn {
            from { transform: translateX(100%); }
            to { transform: translateX(0); }
        }
        
        .notification.hide {
            animation: slideOut 0.5s forwards;
        }
        
        @keyframes slideOut {
            from { transform: translateX(0); }
            to { transform: translateX(100%); }
        }
        
        /* Fade out animation for removed requests */
        @keyframes fadeOut {
            from { opacity: 1; }
            to { opacity: 0; max-height: 0; padding: 0; margin: 0; border: 0; }
        }
        .fade-out {
            animation: fadeOut 0.5s forwards;
            overflow: hidden;
        }
    </style>
</head>
<body>
    @include('nav')
    
    <!-- Notification Container -->
    <div id="notification" class="notification" style="display: none;">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><i class="fas fa-check-circle"></i> Success!</strong>
            <span id="notification-message">Technician assigned successfully!</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center bg-primary text-white">
                        <h4>Assign Technician for Request #{{ $request->id }}</h4>
                        <h5 class="mt-2">{{ $request->request_type }} - {{ $request->problem }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-info">
                            <strong>Computer:</strong> {{ $request->computer_name }} | 
                            <strong>Requested by:</strong> {{ $request->name }}
                        </div>

                        <form id="assign-technician-form" action="{{ route('assign-technician.store', $request->id) }}" method="POST">
                            @csrf
                            
                            <div class="form-group">
                                <label for="technician" class="font-weight-bold">Select Appropriate Technician:</label>
                                
                                @php
                                    $specialistCount = $technicians->where('specialization', '!=', 'general')->count();
                                @endphp
                                
                                @if($specialistCount > 0)
                                    <div class="alert alert-success small mb-3">
                                        Found {{ $specialistCount }} {{ Str::plural('specialist', $specialistCount) }} for this request type
                                    </div>
                                @else
                                    <div class="alert alert-warning small mb-3">
                                        No specialists found. Showing general technicians.
                                    </div>
                                @endif
                                
                                <select name="technician_id" id="technician" class="form-control" required>
                                    <option value="">-- Select Technician --</option>
                                    @forelse ($technicians as $technician)
                                        <option value="{{ $technician->id }}">
                                            {{ $technician->name }}
                                            <span class="text-muted small">({{ $technician->email }})</span>
                                            <span class="{{ $technician->specialization }}-specialist specialist-badge">
                                                @switch($technician->specialization)
                                                    @case('hardware') HW @break
                                                    @case('software') SW @break
                                                    @case('network') Network @break
                                                    @case('password') Password @break
                                                    @case('power') Power @break
                                                    @default General
                                                @endswitch Specialist
                                            </span>
                                        </option>
                                    @empty
                                        <option value="" disabled>NO TECHNICIANS AVAILABLE IN SYSTEM</option>
                                    @endforelse
                                </select>

                                @if($technicians->isEmpty())
                                <div class="alert alert-danger mt-3">
                                    <i class="fas fa-exclamation-triangle"></i>
                                    No technicians found in the system. Please add technicians first.
                                </div>
                                @endif
                            </div>
                            
                           
                            
                            <div class="d-flex justify-content-between mt-4">
                                
                                <button type="submit" class="btn btn-primary" id="assign-btn">
                                    <i class="fas fa-user-check"></i> Assign Technician
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <script>
        $(document).ready(function() {
            // Enhance select dropdown
            $('#technician').focus(function() {
                $(this).css('border-color', '#80bdff');
                $(this).css('box-shadow', '0 0 0 0.2rem rgba(0,123,255,.25)');
            }).blur(function() {
                $(this).css('border-color', '#ced4da');
                $(this).css('box-shadow', 'none');
            });

            // AJAX form submission
            $('#assign-technician-form').on('submit', function(e) {
                e.preventDefault();
                
                // Disable button to prevent multiple submissions
                $('#assign-btn').prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Assigning...');
                
                $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        // Show success notification
                        showNotification('Technician assigned successfully! Request removed from list.');
                        
                        // Remove the request from the list with animation
                        const requestCard = $('#assign-technician-form').closest('.card');
                        requestCard.addClass('fade-out');
                        
                        // After animation completes, remove the element
                        setTimeout(function() {
                            requestCard.remove();
                            
                            // Optionally redirect after removal
                            setTimeout(function() {
                                window.location.href = "{{ route('user-requests') }}";
                            }, 1000);
                            
                        }, 500);
                    },
                    error: function(xhr) {
                        // Show error notification
                        let errorMessage = xhr.responseJSON?.message || 'An error occurred';
                        showNotification(errorMessage, 'danger');
                        
                        // Re-enable button
                        $('#assign-btn').prop('disabled', false).html('<i class="fas fa-user-check"></i> Assign Technician');
                    }
                });
            });
            
            // Notification function
            function showNotification(message, type = 'success') {
                const notification = $('#notification');
                const alertBox = notification.find('.alert');
                
                // Remove previous alert classes
                alertBox.removeClass('alert-success alert-danger alert-warning');
                
                // Set new classes and message
                alertBox.addClass(`alert-${type}`);
                $('#notification-message').text(message);
                
                // Show notification
                notification.fadeIn();
                
                // Hide after 5 seconds
                setTimeout(function() {
                    notification.fadeOut();
                }, 5000);
            }
        });
    </script>
</body>
</html>
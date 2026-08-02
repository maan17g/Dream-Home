<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule Visit — {{ $property->title ?? 'Luxury Living' }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        window.Laravel = {
            isLoggedIn: {{ Auth::check() ? 'true' : 'false' }}
        };
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- External CSS -->
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        body {
            font-family: var(--font-family);
            background-color: var(--bg-body);
            color: var(--text-main);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
            -webkit-font-smoothing: antialiased;
        }

        .booking-container {
            width: 100%;
            max-width: 920px;
            display: grid;
            grid-template-columns: 320px 1fr;
            gap: 2.5rem;
            background-color: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 10px 40px var(--shadow);
            backdrop-filter: blur(8px);
        }

        /* Property Preview Sidebar */
        .property-summary {
            display: flex;
            flex-direction: column;
            border-right: 1px solid var(--border-color);
            padding-right: 2.5rem;
        }

        .property-image-wrapper {
            width: 100%;
            aspect-ratio: 4/3;
            overflow: hidden;
            border-radius: 12px;
            background: var(--form-input-bg);
            margin-bottom: 1.25rem;
            border: 1px solid var(--border-color);
        }

        .property-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s var(--ease-out, ease);
        }

        .booking-container:hover .property-image {
            transform: scale(1.05);
        }

        .property-meta {
            display: flex;
            flex-direction: column;
            gap: 0.4rem;
        }

        .property-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--text-main);
            line-height: 1.3;
        }

        .property-price {
            font-size: 1.1rem;
            color: var(--primary);
            font-weight: 700;
        }

        .property-location {
            font-size: 0.85rem;
            color: var(--text-muted);
            display: flex;
            align-items: center;
            gap: 0.35rem;
        }

        .switch-property-btn {
            margin-top: auto;
            padding-top: 1.5rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--text-muted);
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 500;
            transition: color 0.2s ease;
        }

        .switch-property-btn:hover {
            color: var(--primary);
        }

        /* Form Controls */
        .booking-form {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .form-header {
            margin-bottom: 2rem;
        }

        .form-header h1 {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--text-main);
            margin-bottom: 0.5rem;
        }

        .form-header p {
            font-size: 0.9rem;
            color: var(--text-muted);
        }

        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-group label {
            display: block;
            font-size: 0.83rem;
            font-weight: 500;
            color: var(--text-main);
            margin-bottom: 0.5rem;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            background-color: var(--form-input-bg);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 0.75rem 1rem;
            color: var(--text-main);
            font-family: inherit;
            font-size: 0.9rem;
            outline: none;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .form-group select option {
            background-color: var(--bg-body);
            color: var(--text-main);
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(60, 181, 124, 0.15);
        }

        /* Validation Styling */
        .is-invalid {
            border-color: #dc3545 !important;
        }

        .invalid-feedback {
            color: #dc3545;
            font-size: 0.8rem;
            margin-top: 0.35rem;
            display: block;
        }

        .form-row,
        .actions-group {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        /* Action Buttons */
        .btn {
            flex: 1;
            padding: 0.85rem 1rem;
            font-size: 0.88rem;
            font-weight: 600;
            border-radius: 8px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .btn-secondary {
            background-color: transparent;
            border: 1px solid var(--border-color);
        }

        .btn-secondary:hover {
            border-color: var(--primary);
            color: var(--primary);
            background-color: rgba(60, 181, 124, 0.05);
        }

        .btn-primary {
            background-color: var(--primary);
            color: #ffffff;
            border: 1px solid var(--primary);
        }

        .btn-primary:hover {
            background-color: var(--primary-hover);
            border-color: var(--primary-hover);
        }

        /* Responsive Breakpoints */
        @media (max-width: 768px) {
            .booking-container {
                grid-template-columns: 1fr;
                padding: 1.5rem;
                gap: 1.5rem;
            }

            .property-summary {
                border-right: none;
                border-bottom: 1px solid var(--border-color);
                padding-right: 0;
                padding-bottom: 1.5rem;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .actions-group {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
    @php
        $thumbnail = $property->images->firstWhere('is_thumbnail', true);
        $path = $thumbnail ? $thumbnail->image : 'default-image.jpg';
    @endphp
    <main class="booking-container">

        <!-- Target Property Summary Sidebar -->
        <aside class="property-summary">
            <div class="property-image-wrapper">
                <img src="{{ asset('storage/' . $path) }}" alt="{{ $property->title }}" class="property-image">
            </div>

            <div class="property-meta">
                <h2 class="property-title">{{ $property->title }}</h2>
                <p class="property-price">${{ number_format($property->price) }}</p>
                <p class="property-location">
                    <i class="bi bi-geo-alt"></i>
                    {{ $property->city->address_line }}, {{ $property->city->city }}, {{ $property->city->country }}
                </p>
            </div>

            <!-- Switch context button -->
            <a href="{{ route('property.index') }}" class="switch-property-btn">
                <i class="bi bi-arrow-left"></i> Select a different property
            </a>
        </aside>

        <!-- Main Booking Interface -->
        <section class="booking-form">
            <div>
                <div class="form-header">
                    <h1>Request Private Viewing</h1>
                    <p>Select your preferred slot or save this listing to your profile.</p>
                </div>

                <form id="schedule-form" action="{{ route('appointment.create') }}" method="POST">
                    @csrf
                    <input type="hidden" name="property_id" value="{{ $property->id }}">
                    @error('property_id')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror

                    <div class="form-row">
                        <div class="form-group">
                            <label for="visit_date">Preferred Date</label>
                            <input type="date" id="visit_date" name="visit_date" value="{{ old('visit_date') }}"
                                class="@error('visit_date') is-invalid @enderror" required>
                            @error('visit_date')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="visit_time">Time Slot</label>
                            <select id="visit_time" name="visit_time" class="@error('visit_time') is-invalid @enderror"
                                required>
                                <option value="" disabled {{ old('visit_time') ? '' : 'selected' }}>Select slot
                                </option>
                                <option value="10:00" {{ old('visit_time') == '10:00' ? 'selected' : '' }}>10:00 AM
                                </option>
                                <option value="12:00" {{ old('visit_time') == '12:00' ? 'selected' : '' }}>12:00 PM
                                </option>
                                <option value="14:00" {{ old('visit_time') == '14:00' ? 'selected' : '' }}>02:00 PM
                                </option>
                                <option value="16:00" {{ old('visit_time') == '16:00' ? 'selected' : '' }}>04:00 PM
                                </option>
                            </select>
                            @error('visit_time')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="notes">Special Requirements / Notes</label>
                        <textarea id="notes" name="notes" rows="3" class="@error('notes') is-invalid @enderror"
                            placeholder="Any specific questions or accessibility needs...">{{ old('notes') }}</textarea>
                        @error('notes')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="actions-group">
                        <!-- Action 1: Save Listing -->
                        <button type="button" class="btn-save-prop js-fav-btn" data-id="{{ $property->id }}">
                            <i
                                class="bi {{ $property->savedProperties->contains('user_id', auth()->id()) ? 'bi-heart-fill' : 'bi-heart' }}"></i>
                            <span>
                                {{ $property->savedProperties->contains('user_id', auth()->id()) ? 'Saved Property' : 'Save Property' }}
                            </span>
                        </button>

                        <!-- Action 2: Submit Schedule Request -->
                        <button type="submit" name="action" value="schedule" class="btn btn-primary">
                            <i class="bi bi-calendar-check"></i> Schedule Visit
                        </button>
                    </div>
                </form>
            </div>
        </section>

    </main>

    @include('layout.Notification')
    <script src="{{ asset('asset/js/script.js') }}"></script>
</body>

</html>

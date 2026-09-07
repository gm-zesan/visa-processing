@extends('frontend.layouts.app')

@section('title')
    contact
@endsection

@push("styles")
    @vite(['resources/scss/frontend/contact.scss'])
@endpush


@section('content')

    @if(session('success'))
        <div style="position: fixed; top: -20px; left: 50%; transform: translate(-50%, -50%); background-color: #fff; color: #111A3A; padding: 5px 15px; border-radius: 5px; display: flex; align-items: center; gap: 10px; opacity: 1; z-index: 1025"
            id="success-message">
            <svg xmlns="http://www.w3.org/2000/svg" height="14" width="14" viewBox="0 0 512 512">
                <path fill="#111A3A"
                    d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
            </svg> {{ session('success') }}
        </div>
    @endif


    <!-- contact_page_area -->
    <div class="contact_page_area" style="background-image: url({{ asset(getSettingsData('43', 'image')) }});">
        <div class="container">
            <div class="contact_wrapper">
                <h2>{{ getSettingsData('43', 'title') }}</h2>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">HOME</a></li>
                        <li class="breadcrumb-item active">{{ getSettingsData('43', 'title') }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- touch_from_area -->
    <div class="touch_from_area">
        <form action="{{route('message.store')}}" method="POST">
            @csrf
            <div class="container">
                <div class="row g-0">
                    <div class="col-lg-6 mt_50">
                        <div class="touch_left">
                            <h2>Get In Touch</h2>
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" name="name" placeholder="Your Name">
                                </div>
                                <div class="col-lg-6">
                                    <input type="email" name="email" placeholder="Your Email">
                                </div>
                                <div class="col-lg-6">
                                    <input type="tel" name="phone" placeholder="Your Phone">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" name="subject" placeholder="Subject">
                                </div>
                                <div class="col-lg-12">
                                    <textarea name="message" placeholder="Message"></textarea>
                                </div>
                                <div class="col-lg-6">
                                    <button type="submit" class="sub_btn">Send Request</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mt_50">
                        <div class="company_right">
                            <div class="company_item">
                                <div class="company_icons">
                                    <i class="fa-solid fa-location-pin"></i>
                                </div>
                                <div class="company_cont">
                                    <h2>Company Location</h2>
                                    <p>{{ (getSettingsData('44', 'button_text') && str_contains(getSettingsData('44', 'button_text'), 'Lift 14')) ? getSettingsData('44', 'button_text') : 'Tower A (Lift 14), House 13, Road 17, Banani, Dhaka.' }}</p>
                                </div>
                            </div>
                            <div class="company_item">
                                <div class="company_icons">
                                    <i class="fa-solid fa-phone"></i>
                                </div>
                                <div class="company_cont">
                                    <h2>Telephone Number</h2>
                                    <ul>
                                        <li><a
                                                href="tel:{{ getSettingsData('44', 'title') }}">{{ getSettingsData('44', 'title') }}</a>
                                        </li>
                                        <!-- <li><a href="tel:880636524265">+880 636 524 265,</a></li> -->
                                    </ul>
                                </div>
                            </div>
                            <div class="company_item">
                                <div class="company_icons">
                                    <i class="fa-regular fa-envelope"></i>
                                </div>
                                <div class="company_cont">
                                    <h2>Our Email Address</h2>
                                    <ul>
                                        <li><a
                                                href="mailto:{{ getSettingsData('44', 'subtitle') }}">{{ getSettingsData('44', 'subtitle') }}</a>
                                        </li>
                                        <!-- <li><a href="mailto:yourinfo@gmail.com">yourinfo@gmail.com</a></li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- office_location_area -->
    @php
        $officeSteps = getSettingsList('office-tour-step');
        if (!$officeSteps || count($officeSteps) === 0) {
            $officeSteps = collect([
                (object) ['button_text' => '01', 'subtitle' => 'Road Approach', 'title' => 'Road 17, Banani, Dhaka', 'hints' => 'Turn onto Road 17 towards House 13 (Tower A)', 'description' => 'Direct street approach in Banani commercial district. Easy vehicular access, rickshaw drop-off, and parking near House 13.', 'image' => 'upload/office/road.jpeg'],
                (object) ['button_text' => '02', 'subtitle' => 'Building Landmark', 'title' => 'Tower-A Building Exterior', 'hints' => 'House 13, Road 17, Banani (Tower-A)', 'description' => 'Prominent commercial tower. Enter through the main lobby with 24/7 security and high-speed elevators to Lift 14.', 'image' => 'upload/office/tower.jpeg'],
                (object) ['button_text' => '03', 'subtitle' => 'Lift 14 Entrance', 'title' => 'Main Office Entrance & Signboard', 'hints' => 'Take the elevator directly to Lift 14', 'description' => 'Step out at Lift 14 to find our branded entrance door displaying official AL FAHIM INTERNATIONAL credentials.', 'image' => 'upload/office/welcome.jpeg'],
                (object) ['button_text' => '04', 'subtitle' => 'Helpdesk & Check-In', 'title' => 'Front Reception & Inquiry Desk', 'hints' => 'Consultation tokens & country brochures', 'description' => 'Check in with our reception officers for candidate verification, recruitment tokens, and country-specific job circulars.', 'image' => 'upload/office/reception-1.jpeg'],
                (object) ['button_text' => '05', 'subtitle' => 'Candidate Lounge', 'title' => 'Client Waiting & Briefing Lounge', 'hints' => 'Live country displays & global maps', 'description' => 'Air-conditioned lounge equipped with comfortable seating, international migration wall maps, and information displays.', 'image' => 'upload/office/reception-2.jpeg'],
                (object) ['button_text' => '06', 'subtitle' => 'Operations Floor', 'title' => 'Visa Processing & Documentation Desk', 'hints' => 'BMET, embassy & contract scrutiny', 'description' => 'Our dedicated team reviewing candidate passports, medical test reports, embassy visa endorsements, and BMET clearances.', 'image' => 'upload/office/my-team.jpeg'],
                (object) ['button_text' => '07', 'subtitle' => 'Counseling Cabin', 'title' => 'Executive Counseling Chamber', 'hints' => 'Confidential one-on-one career guidance', 'description' => 'Private cabin where senior counselors guide you through overseas employment contracts, salary packages, and worker rights.', 'image' => 'upload/office/room-1.jpeg'],
                (object) ['button_text' => '08', 'subtitle' => 'Interview & Clearance', 'title' => 'Interview & Document Clearance Room', 'hints' => 'Foreign employer interviews & visa delivery', 'description' => 'Dedicated facility for foreign employer video interviews, contract signing, and final pre-departure travel briefing.', 'image' => 'upload/office/room-2.jpeg'],
            ]);
        }

        $stepsForJs = $officeSteps->map(function ($item) {
            $imagePath = $item->image ? str_replace(['frontend/images/office/enhanced/', 'frontend/images/office/'], 'upload/office/', $item->image) : 'upload/office/road.jpeg';
            return [
                'step' => $item->button_text,
                'tag' => $item->subtitle,
                'title' => $item->title,
                'hint' => $item->hints ?? 'Banani Corporate Office',
                'desc' => strip_tags($item->description),
                'img' => asset($imagePath),
            ];
        })->values();
     @endphp

    <div class="office_location_area" id="office-location">
        <div class="container">
            <div class="choose_top text-center" data-aos="fade-up">
                <h3>{{ getSettingsData('contact-office-tour-header', 'title') ?? 'OFFICE LOCATION' }}</h3>
                <h2><span>Road to Room:</span>
                    {{ getSettingsData('contact-office-tour-header', 'subtitle') ?? 'How to Reach Our Office' }}</h2>
                <div class="em_bar_bg"></div>
                @if(getSettingsData('contact-office-tour-header', 'description'))
                    <p>{{ getSettingsData('contact-office-tour-header', 'description') }}</p>
                @endif
            </div>

            <div class="row">
                @foreach($officeSteps as $idx => $item)
                    @php
                        $cardImg = $item->image ? str_replace(['frontend/images/office/enhanced/', 'frontend/images/office/'], 'upload/office/', $item->image) : 'upload/office/road.jpeg';
                    @endphp
                    <div class="col-lg-4 col-md-6 col-sm-6 mt_30" data-aos="fade-up">
                        <div class="office_location_card" data-step-index="{{ $idx }}">
                            <div class="office_card_img">
                                <img src="{{ asset($cardImg) }}" alt="{{ $item->title }}" loading="lazy" decoding="async">
                                <span class="step_badge">Step {{ $item->button_text }}</span>
                                <div class="zoom_hint">
                                    <span><i class="fa-solid fa-expand"></i> View Details</span>
                                </div>
                            </div>
                            <div class="office_card_content">
                                <span class="step_tag">{{ $item->subtitle }}</span>
                                <h3>{{ $item->title }}</h3>
                                <p>{{ strip_tags($item->description) }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Descriptive Office Modal with Left/Right Image Navigation (Bootstrap 5) -->
    <div class="modal fade" id="officeImageModal" tabindex="-1" aria-labelledby="officeImageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content office_modal_content">
                <div class="modal-header office_modal_header">
                    <div class="d-flex align-items-center gap-3">
                        <span class="step_badge_modal" id="modalStepBadge">Step 01</span>
                        <h4 class="modal_title_text" id="officeImageModalLabel"></h4>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <div class="row g-0">
                        <!-- Image with Left / Right Navigation Arrows -->
                        <div class="col-lg-7 col-md-12">
                            <div class="modal_img_viewport">
                                <button type="button" class="modal_arrow_btn prev_arrow" id="modalPrevArrow"
                                    aria-label="Previous image">
                                    <i class="fa-solid fa-chevron-left"></i>
                                </button>
                                <img src="" id="modalOfficeImg" class="img-fluid" alt="Office Step Photo">
                                <button type="button" class="modal_arrow_btn next_arrow" id="modalNextArrow"
                                    aria-label="Next image">
                                    <i class="fa-solid fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                        <!-- Descriptive Sidebar -->
                        <div class="col-lg-5 col-md-12">
                            <div class="modal_details_pane">
                                <div class="details_top">
                                    <span class="details_tag" id="modalStepTag"></span>
                                    <h3 class="details_title" id="modalStepTitle"></h3>
                                    <div class="details_hint_box">
                                        <i class="fa-solid fa-location-dot"></i>
                                        <span id="modalStepHint"></span>
                                    </div>
                                    <div class="details_desc_box">
                                        <p id="modalOfficeDesc"></p>
                                    </div>
                                </div>
                                <div class="details_bottom">
                                    <div class="details_location_card">
                                        <h6><i class="fa-regular fa-building"></i> AL FAHIM INTERNATIONAL</h6>
                                        <p>Tower A (Lift 14), House 13, Road 17, Banani, Dhaka.</p>
                                    </div>
                                    <div class="modal_nav_bar">
                                        <span class="step_count_text">
                                            Step <span id="modalCurrentIndex">1</span> of <span
                                                id="modalTotalCount">8</span>
                                        </span>
                                        <div class="nav_btn_group">
                                            <button type="button" class="btn_theme_nav" id="modalNavPrev">
                                                <i class="fa-solid fa-arrow-left"></i> Prev
                                            </button>
                                            <button type="button" class="btn_theme_nav" id="modalNavNext">
                                                Next <i class="fa-solid fa-arrow-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- map_section -->
    <div class="map_section">
        @php
            $mapIframe = getSettingsData('44', 'description');
            if (!$mapIframe || str_contains($mapIframe, '116834.00977793444') || !str_contains($mapIframe, '788.4086831465061')) {
                $mapIframe = '<iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d788.4086831465061!2d90.40402530398177!3d23.793344929518337!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjPCsDQ3JzM2LjQiTiA5MMKwMjQnMTMuNiJF!5e0!3m2!1sen!2sbd!4v1788759632977!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>';
            }
        @endphp
        {!! $mapIframe !!}
    </div>
@endsection
@push('scripts')
    <script>
        const successMsg = document.getElementById('success-message');
        if (successMsg) {
            setTimeout(() => {
                successMsg.style.opacity = '1';
                successMsg.style.top = '30px';
                successMsg.style.transition = 'all 0.3s ease-in-out';
                setTimeout(() => {
                    successMsg.style.opacity = '0';
                    successMsg.style.top = '-20px';
                }, 3000);
            }, 100);
        }

        // Descriptive Office Modal with Left/Right Image Navigation
        (function () {
            const stepsData = @json($stepsForJs);
            if (!stepsData || !stepsData.length) return;

            let currentIndex = 0;
            const modalEl = document.getElementById('officeImageModal');
            if (!modalEl) return;

            const bsModal = new bootstrap.Modal(modalEl);
            const modalImg = document.getElementById('modalOfficeImg');
            const modalBadge = document.getElementById('modalStepBadge');
            const modalHeaderLabel = document.getElementById('officeImageModalLabel');
            const modalTag = document.getElementById('modalStepTag');
            const modalTitle = document.getElementById('modalStepTitle');
            const modalHint = document.getElementById('modalStepHint');
            const modalDesc = document.getElementById('modalOfficeDesc');
            const modalCurrentIndex = document.getElementById('modalCurrentIndex');
            const modalTotalCount = document.getElementById('modalTotalCount');

            if (modalTotalCount) modalTotalCount.textContent = stepsData.length;

            function renderStep(index) {
                if (index < 0) index = stepsData.length - 1;
                if (index >= stepsData.length) index = 0;
                currentIndex = index;

                const step = stepsData[currentIndex];
                if (!step) return;

                if (modalImg) {
                    modalImg.style.opacity = '0.3';
                    modalImg.src = step.img;
                    modalImg.onload = function () { modalImg.style.opacity = '1'; };
                }

                if (modalBadge) modalBadge.textContent = 'Step ' + step.step;
                if (modalHeaderLabel) modalHeaderLabel.textContent = step.title;
                if (modalTag) modalTag.textContent = step.tag;
                if (modalTitle) modalTitle.textContent = step.title;
                if (modalHint) modalHint.textContent = step.hint;
                if (modalDesc) modalDesc.textContent = step.desc;
                if (modalCurrentIndex) modalCurrentIndex.textContent = (currentIndex + 1);
            }

            function prevStep() { renderStep(currentIndex - 1); }
            function nextStep() { renderStep(currentIndex + 1); }

            // Attach card click handlers
            document.querySelectorAll('.office_location_card').forEach(card => {
                card.addEventListener('click', function () {
                    const idx = parseInt(this.getAttribute('data-step-index'), 10) || 0;
                    renderStep(idx);
                    bsModal.show();
                });
            });

            // Navigation buttons
            document.getElementById('modalPrevArrow')?.addEventListener('click', function (e) {
                e.stopPropagation();
                prevStep();
            });
            document.getElementById('modalNextArrow')?.addEventListener('click', function (e) {
                e.stopPropagation();
                nextStep();
            });
            document.getElementById('modalNavPrev')?.addEventListener('click', function (e) {
                e.stopPropagation();
                prevStep();
            });
            document.getElementById('modalNavNext')?.addEventListener('click', function (e) {
                e.stopPropagation();
                nextStep();
            });

            // Keyboard navigation
            document.addEventListener('keydown', function (e) {
                if (!modalEl.classList.contains('show')) return;
                if (e.key === 'ArrowLeft') {
                    e.preventDefault();
                    prevStep();
                } else if (e.key === 'ArrowRight') {
                    e.preventDefault();
                    nextStep();
                }
            });
        })();
    </script>
@endpush
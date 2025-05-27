@extends('layouts.master')

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

@section('content')
<style>
    .bg-light-green-50 {
        background-color: #f0fdf4;
    }

    .bg-light-green-100 {
        background-color: #dcfce7;
    }

    .text-light-green-600 {
        color: #16a34a;
    }

    .bg-light-blue-50 {
        background-color: #f0f9ff;
    }

    .bg-light-blue-100 {
        background-color: #e0f2fe;
    }

    .text-light-blue-600 {
        color: #0284c7;
    }

    .bg-light-purple-50 {
        background-color: #faf5ff;
    }

    .bg-light-purple-100 {
        background-color: #f3e8ff;
    }

    .text-light-purple-600 {
        color: #9333ea;
    }

</style>
<section
    style="background: linear-gradient(135deg, #4F46E5, #8B5CF6); padding: 60px 0; text-align: center; color: white;">
    <div style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
        <h1 style="font-size: 48px; font-weight: 800; margin-bottom: 20px; letter-spacing: -1px;">Elevated
            Healthcare</h1>
        <p
            style="font-size: 20px; margin-bottom: 50px; max-width: 700px; margin-left: auto; margin-right: auto; line-height: 1.5; color:#fff">
            Pioneering healthcare solutions with world-class professionals and cutting-edge technology
        </p>

        <div style="display: flex; justify-content: center; gap: 40px; flex-wrap: wrap;">
            <div
                style="background: white; color: #333; border-radius: 16px; padding: 40px 25px; width: 320px; box-shadow: 0 8px 24px rgba(0,0,0,0.1); transition: transform 0.3s ease;">
                <div
                    style="background: linear-gradient(135deg, #F59E0B, #EF4444); width: 70px; height: 70px; border-radius: 16px; display: flex; align-items: center; justify-content: center; margin: 0 auto 25px; font-size: 28px; color: white;">
                    ❤️
                </div>
                <h3 style="font-size: 22px; margin-bottom: 15px; color: #111;">Patient-Centered Care</h3>
                <p style="color: #555; line-height: 1.6;">Our holistic approach prioritizes your comfort and
                    wellbeing with personalized treatment plans.</p>
            </div>
            <div
                style="background: white; color: #333; border-radius: 16px; padding: 40px 25px; width: 320px; box-shadow: 0 8px 24px rgba(0,0,0,0.1); transition: transform 0.3s ease;">
                <div
                    style="background: linear-gradient(135deg, #10B981, #3B82F6); width: 70px; height: 70px; border-radius: 16px; display: flex; align-items: center; justify-content: center; margin: 0 auto 25px; font-size: 28px; color: white;">
                    🛡️
                </div>
                <h3 style="font-size: 22px; margin-bottom: 15px; color: #111;">Expert Practitioners</h3>
                <p style="color: #555; line-height: 1.6;">Board-certified specialists with rigorous credentials
                    and ongoing training in their fields.</p>
            </div>
            <div
                style="background: white; color: #333; border-radius: 16px; padding: 40px 25px; width: 320px; box-shadow: 0 8px 24px rgba(0,0,0,0.1); transition: transform 0.3s ease;">
                <div
                    style="background: linear-gradient(135deg, #8B5CF6, #EC4899); width: 70px; height: 70px; border-radius: 16px; display: flex; align-items: center; justify-content: center; margin: 0 auto 25px; font-size: 28px; color: white;">
                    ⏰
                </div>
                <h3 style="font-size: 22px; margin-bottom: 15px; color: #111;">Always Available</h3>
                <p style="color: #555; line-height: 1.6;">Continuous care with telehealth options and emergency
                    services whenever you need them.</p>
            </div>
        </div>

        <div style="display: flex; justify-content: center; gap: 20px; margin-top: 50px;">
            <button id="getStartedBtn" class="scroll-to-register"
                style="background: white; color: #4F46E5; border: none; padding: 16px 32px; border-radius: 12px; font-size: 18px; font-weight: 600; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
                Get Started
            </button>
        </div>
    </div>
</section>

<section style="background-color: #f6f9ff; padding: 40px;">
    <div
        style="background: linear-gradient(90deg, #3366FF, #9933FF); color: white; padding: 40px; border-radius: 16px; text-align: center;">
        <h1 style="font-size: 36px; font-weight: bold;">CARESYSTEMS</h1>
        <p style="font-size: 18px; color:#fff">Manage your healthcare appointments, staff, and clients with ease</p>
    </div>
    <div style="display: flex; flex-wrap: wrap; justify-content: center; margin-top: 30px; gap: 20px;">
        <div
            style="background: white; border-radius: 12px; padding: 20px; width: 300px; box-shadow: 0 4px 12px rgba(0,0,0,0.05);">
            <div style="display: flex; align-items: center; gap: 10px;">
                <div
                    style="background: #8b5cf6; padding: 12px; border-radius: 10px; color: white; width: 48px; height: 48px; display: flex; align-items: center; justify-content: center;">
                    <i class="fas fa-calendar-alt" style="font-size: 20px;"></i>
                </div>
                <div>
                    <strong style="font-size: 24px;">{{ $appointments }}+</strong>
                    <p style="margin: 0; color: #6b7280;">Appointments</p>
                </div>
            </div>
        </div>

        <div
            style="background: white; border-radius: 12px; padding: 20px; width: 300px; box-shadow: 0 4px 12px rgba(0,0,0,0.05);">
            <div style="display: flex; align-items: center; gap: 10px;">
                <div
                    style="background: #10b981; padding: 12px; border-radius: 10px; color: white; width: 48px; height: 48px; display: flex; align-items: center; justify-content: center;">
                    <i class="fas fa-user-nurse" style="font-size: 20px;"></i>
                </div>
                <div>
                    <strong style="font-size: 24px;">{{ $nurses }}+</strong>
                    <p style="margin: 0; color: #6b7280;">Nurses</p>
                </div>
            </div>
        </div>

        <div
            style="background: white; border-radius: 12px; padding: 20px; width: 300px; box-shadow: 0 4px 12px rgba(0,0,0,0.05);">
            <div style="display: flex; align-items: center; gap: 10px;">
                <div
                    style="background: #f97316; padding: 12px; border-radius: 10px; color: white; width: 48px; height: 48px; display: flex; align-items: center; justify-content: center;">
                    <i class="fas fa-hands-helping" style="font-size: 20px;"></i>
                </div>
                <div>
                    <strong style="font-size: 24px;">{{ $caregivers }}+</strong>
                    <p style="margin: 0; color: #6b7280;">Caregivers</p>
                </div>
            </div>
        </div>

        <div
            style="background: white; border-radius: 12px; padding: 20px; width: 300px; box-shadow: 0 4px 12px rgba(0,0,0,0.05);">
            <div style="display: flex; align-items: center; gap: 10px;">
                <div
                    style="background: #ec4899; padding: 12px; border-radius: 10px; color: white; width: 48px; height: 48px; display: flex; align-items: center; justify-content: center;">
                    <i class="fas fa-users" style="font-size: 20px;"></i>
                </div>
                <div>
                    <strong style="font-size: 24px;">{{ $clients }}+</strong>
                    <p style="margin: 0; color: #6b7280;">Clients</p>
                </div>
            </div>
        </div>
    </div>
    <div class="card border-0 shadow-sm mb-4 mt-3">
        <div class="card-body p-4">
            <h3 class="h4 font-weight-bold text-gray-800 mb-4">Available Roles</h3>
            <div class="row g-3" id="roleAccordion">
                <div class="col-md-4">
                    <div class="card border-0 bg-light-blue-50 hover-shadow transition-all"
                        style="height: auto; border-radius: 15px;">
                        <div class="card-body d-flex flex-column justify-content-center p-4">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <div class="bg-light-blue-100 rounded-circle d-inline-flex align-items-center justify-content-center me-2"
                                        style="width: 36px; height: 36px;">
                                        <i class="fas fa-hands-helping text-light-blue-600 fs-6"></i>
                                    </div>
                                    <h4 class="h6 font-weight-bold text-gray-800 mb-0">Caregiver</h4>
                                </div>
                                <button class="btn btn-sm p-0" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#caregiverDesc" aria-expanded="false" aria-controls="caregiverDesc">
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                            </div>
                            <div class="collapse mt-2" id="caregiverDesc" data-bs-parent="#roleAccordion">

                                <div class="text-muted small mb-2 bg-white p-4" style="border-radius: 22px;">
                                    <strong>Requirements:</strong>
                                    <ul class="list-unstyled">
                                        <li><i class="fas fa-check-circle text-success me-2"></i> Valid Driver's
                                            License and Vehicle Insurance (GA requirements)</li>
                                        <li><i class="fas fa-check-circle text-success me-2"></i> Reliable vehicle
                                            in good working condition</li>
                                        <li><i class="fas fa-check-circle text-success me-2"></i> Flexible schedule
                                            availability</li>
                                        <li><i class="fas fa-check-circle text-success me-2"></i> Pass fingerprint
                                            background clearance</li>
                                        <li><i class="fas fa-check-circle text-success me-2"></i> Health Screening
                                            (Physical) within 1 year</li>
                                        <li><i class="fas fa-check-circle text-success me-2"></i> Negative TB test
                                            within 1 year</li>
                                        <li><i class="fas fa-check-circle text-success me-2"></i> Current CPR and
                                            First Aid certification</li>
                                    </ul>
                                </div>
                                <div class="text-muted small mb-2 bg-white p-4" style="border-radius: 22px;">
                                    <strong>Required Documents:</strong>
                                    <ul class="list-unstyled">
                                        <li><i class="fas fa-file-alt text-primary me-2"></i> Driver's License</li>
                                        <li><i class="fas fa-file-alt text-primary me-2"></i> Vehicle Insurance</li>
                                        <li><i class="fas fa-file-alt text-primary me-2"></i> Background Check
                                            Authorization</li>
                                        <li><i class="fas fa-file-alt text-primary me-2"></i> Physical Examination
                                            Results</li>
                                        <li><i class="fas fa-file-alt text-primary me-2"></i> TB Test Results</li>
                                        <li><i class="fas fa-file-alt text-primary me-2"></i> CPR/First Aid
                                            Certification</li>
                                    </ul>
                                </div>

                                <div class="text-center mt-3">
                                    <button class="btn btn-outline-primary">Apply Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card border-0 bg-light-blue-50 hover-shadow transition-all"
                        style="height: auto; border-radius: 15px;">
                        <div class="card-body d-flex flex-column justify-content-center p-4">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <div class="bg-light-blue-100 rounded-circle d-inline-flex align-items-center justify-content-center me-2"
                                        style="width: 36px; height: 36px;">
                                        <i class="fas fa-user-shield text-light-blue-600 fs-6"></i>
                                    </div>
                                    <h4 class="h6 font-weight-bold text-gray-800 mb-0">PCA</h4>
                                </div>
                                <button class="btn btn-sm p-0" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#pcaDesc" aria-expanded="false" aria-controls="pcaDesc">
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                            </div>
                            <div class="collapse mt-2" id="pcaDesc" data-bs-parent="#roleAccordion">

                                <div class="text-muted small mb-2 bg-white p-4" style="border-radius: 22px;">
                                    <strong>Requirements:</strong>
                                    <ul class="list-unstyled">
                                        <li><i class="fas fa-check-circle text-success me-2"></i> Valid Driver's
                                            License and Vehicle Insurance (GA requirements)</li>
                                        <li><i class="fas fa-check-circle text-success me-2"></i> Reliable vehicle
                                            in good working condition</li>
                                        <li><i class="fas fa-check-circle text-success me-2"></i> Flexible schedule
                                            availability</li>
                                        <li><i class="fas fa-check-circle text-success me-2"></i> Pass fingerprint
                                            background clearance</li>
                                        <li><i class="fas fa-check-circle text-success me-2"></i> Health Screening
                                            (Physical) within 1 year</li>
                                        <li><i class="fas fa-check-circle text-success me-2"></i> Negative TB test
                                            within 1 year</li>
                                        <li><i class="fas fa-check-circle text-success me-2"></i> Current CPR and
                                            First Aid certification</li>
                                        <li><i class="fas fa-check-circle text-success me-2"></i> PCA Certification
                                        </li>
                                        <li><i class="fas fa-check-circle text-success me-2"></i> Minimum 6 months
                                            healthcare experience</li>
                                    </ul>
                                </div>

                                <div class="text-muted small mb-2 bg-white p-4" style="border-radius: 22px;">
                                    <strong>Additional Skills:</strong>
                                    <ul class="list-unstyled">
                                        <li><i class="fas fa-star text-warning me-2"></i> Basic patient care skills
                                        </li>
                                        <li><i class="fas fa-star text-warning me-2"></i> Vital signs monitoring
                                        </li>
                                        <li><i class="fas fa-star text-warning me-2"></i> Patient mobility
                                            assistance</li>
                                        <li><i class="fas fa-star text-warning me-2"></i> Personal hygiene care</li>
                                        <li><i class="fas fa-star text-warning me-2"></i> Meal preparation and
                                            feeding assistance</li>
                                    </ul>
                                </div>
                                <div class="text-muted small mb-2 bg-white p-4" style="border-radius: 22px;">
                                    <strong>Required Documents:</strong>
                                    <ul class="list-unstyled">
                                        <li><i class="fas fa-file-alt text-primary me-2"></i> Driver's License</li>
                                        <li><i class="fas fa-file-alt text-primary me-2"></i> Vehicle Insurance</li>
                                        <li><i class="fas fa-file-alt text-primary me-2"></i> Background Check
                                            Authorization</li>
                                        <li><i class="fas fa-file-alt text-primary me-2"></i> Physical Examination
                                            Results</li>
                                        <li><i class="fas fa-file-alt text-primary me-2"></i> TB Test Results</li>
                                        <li><i class="fas fa-file-alt text-primary me-2"></i> CPR/First Aid
                                            Certification</li>
                                        <li><i class="fas fa-file-alt text-primary me-2"></i> PCA Certification</li>
                                    </ul>
                                </div>

                                <div class="text-center mt-3">
                                    <button class="btn btn-outline-primary ">Apply Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card border-0 bg-light-blue-50 hover-shadow transition-all"
                        style="height: auto; border-radius: 15px;">
                        <div class="card-body d-flex flex-column justify-content-center p-4">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <div class="bg-light-blue-100 rounded-circle d-inline-flex align-items-center justify-content-center me-2"
                                        style="width: 36px; height: 36px;">
                                        <i class="fas fa-user-nurse text-light-blue-600 fs-6"></i>
                                    </div>
                                    <h4 class="h6 font-weight-bold text-gray-800 mb-0">Nurse</h4>
                                </div>
                                <button class="btn btn-sm p-0" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#nurseDesc" aria-expanded="false" aria-controls="nurseDesc">
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                            </div>
                            <div class="collapse mt-2" id="nurseDesc" data-bs-parent="#roleAccordion">
                                <div class="text-muted small mb-2 bg-white p-4" style="border-radius: 22px;">
                                    <strong>Requirements:</strong>
                                    <ul class="list-unstyled">
                                        <li><i class="fas fa-check-circle text-success me-2"></i> Valid Driver's License
                                            and Vehicle Insurance (GA requirements)</li>
                                        <li><i class="fas fa-check-circle text-success me-2"></i> Reliable vehicle in
                                            good working condition</li>
                                        <li><i class="fas fa-check-circle text-success me-2"></i> Flexible schedule
                                            availability</li>
                                        <li><i class="fas fa-check-circle text-success me-2"></i> Pass fingerprint
                                            background clearance</li>
                                        <li><i class="fas fa-check-circle text-success me-2"></i> Health Screening
                                            (Physical) within 1 year</li>
                                        <li><i class="fas fa-check-circle text-success me-2"></i> Negative TB test
                                            within 1 year</li>
                                        <li><i class="fas fa-check-circle text-success me-2"></i> Current CPR and First
                                            Aid certification</li>
                                        <li><i class="fas fa-check-circle text-success me-2"></i> Valid Nursing License
                                        </li>
                                        <li><i class="fas fa-check-circle text-success me-2"></i> Minimum 1 year
                                            clinical experience</li>
                                    </ul>
                                </div>
                                <div class="text-muted small mb-2 bg-white p-4" style="border-radius: 22px;">
                                    <strong>Required Documents:</strong>
                                    <ul>
                                        <li><i class="fas fa-file-alt text-primary me-2"></i> Driver's License</li>
                                        <li><i class="fas fa-file-alt text-primary me-2"></i> Vehicle Insurance</li>
                                        <li><i class="fas fa-file-alt text-primary me-2"></i> Background Check
                                            Authorization</li>
                                        <li><i class="fas fa-file-alt text-primary me-2"></i> Physical Examination
                                            Results</li>
                                        <li><i class="fas fa-file-alt text-primary me-2"></i> TB Test Results</li>
                                        <li><i class="fas fa-file-alt text-primary me-2"></i> CPR/First Aid
                                            Certification</li>
                                    </ul>
                                </div>
                                <div class="text-center mt-3">
                                    <button class="btn btn-outline-primary">Apply Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12">
                    <div class="card border-0 bg-light-blue-50 shadow-sm" style="border-radius: 15px;">
                        <div class="card-body text-center p-4">
                            <h4 class="h5 text-gray-800 font-weight-bold mb-2">Facility Document Management</h4>
                            <p class="text-muted mb-3">
                                Healthcare facilities can securely upload and manage documentation through
                                our platform.
                            </p>
                            <button class="btn btn-primary scroll-to-register">Register Facility</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<div class="container" style="margin-top: 50px; margin-bottom: 50px;" id="registrationForm">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow" style="border-radius: 16px; border: none;background-color:#f6f9ff;">
                <div class="card-body p-5">
                    <h2 class="text-center mb-4" style="color: #4F46E5; font-weight: 700;">Facility Registration</h2>

                    <form action="{{ route('company.add') }}" method="POST" id="registerForm" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <label for="facilityName" class="form-label"
                                    style="color: #555; font-weight: 500;">Facility Name*</label>
                                <input type="text" class="form-control" id="facilityName" name="facility_name"
                                    style="padding: 12px 16px; border-radius: 8px; border: 1px solid #ddd;">
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label"
                                    style="color: #555; font-weight: 500;">Email*</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    style="padding: 12px 16px; border-radius: 8px; border: 1px solid #ddd;">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <label for="phone" class="form-label" style="color: #555; font-weight: 500;">Phone
                                    Number*</label>
                                <input type="tel" class="form-control" id="phone" name="phone"
                                    style="padding: 12px 16px; border-radius: 8px; border: 1px solid #ddd;">
                            </div>
                            <div class="col-md-6">
                                <label for="beds" class="form-label" style="color: #555; font-weight: 500;">Number of
                                    Beds*</label>
                                <input type="number" min="1" class="form-control" id="beds" name="beds"
                                    style="padding: 12px 16px; border-radius: 8px; border: 1px solid #ddd;">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-12">
                                <label for="address" class="form-label" style="color: #555; font-weight: 500;">Facility
                                    Address*</label>
                                <textarea class="form-control" id="address" name="address"
                                    style="padding: 12px 16px; border-radius: 8px; border: 1px solid #ddd; min-height: 100px;"></textarea>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-12">
                                <label for="website" class="form-label" style="color: #555; font-weight: 500;">Website
                                    (Optional)</label>
                                <input type="url" class="form-control" id="website" name="website"
                                    placeholder="https://example.com"
                                    style="padding: 12px 16px; border-radius: 8px; border: 1px solid #ddd;">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="terms" name="terms"
                                        style="margin-right: 10px;">
                                    <label class="form-check-label" for="terms" style="color: #555;">
                                        I agree to the <a href="#" style="color: #4F46E5;">Terms of Service</a> and <a
                                            href="#" style="color: #4F46E5;">Privacy Policy</a>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary"
                                    style="background: linear-gradient(135deg, #4F46E5, #8B5CF6); border: none; padding: 12px 28px; border-radius: 12px; font-size: 16px; font-weight: 600; box-shadow: 0 4px 12px rgba(0,0,0,0.1); width: 100%; max-width: 300px;">
                                    Register Facility
                                </button>
                            </div>
                        </div>
                    </form>


                    <p class="text-center mt-4" style="color: #666;">
                        Already have an account? <a href="{{route('admin_login')}}" style="color: #4F46E5;">Sign in</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>



<section class="bg-white py-16">
    <div class="container">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-4 text-gray-900">
                Become a <span class="text-teal-600">Care Systems Partner</span>
            </h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                Join our network of healthcare professionals and elevate your practice with our support.
            </p>
        </div>

        <div class="row justify-content-center">

            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card h-100 border-0 shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-1"
                    style="    border-radius: 20px;
    background-color: #f6f9ff;">
                    <div class="card-body text-center p-5">
                        <div class="position-absolute top-0 start-0 translate-middle bg-teal-600 text-white rounded-circle d-flex align-items-center justify-content-center shadow-sm"
                            style="background-color: #4f46e5; width: 32px; height: 32px; font-weight: 600;">
                            1
                        </div>
                        <div class="bg-teal-50 rounded-circle d-inline-flex align-items-center justify-content-center mb-4 p-3"
                            style="width: 70px; height: 70px;">
                            <i class="fas fa-user-plus text-teal-600 fs-3"></i>
                        </div>
                        <h3 class="h5 font-weight-bold text-gray-800 mb-3">Join Care Systems</h3>
                        <p class="text-gray-600 mb-0">
                            Begin your journey by completing our simple registration process.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card h-100 border-0 shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-1"
                    style="    border-radius: 20px;
    background-color: #f6f9ff;">
                    <div class="card-body text-center p-5">
                        <div class="position-absolute top-0 start-0 translate-middle bg-teal-600 text-white rounded-circle d-flex align-items-center justify-content-center shadow-sm"
                            style="background-color: #4f46e5; width: 32px; height: 32px; font-weight: 600;">
                            2
                        </div>
                        <div class="bg-teal-50 rounded-circle d-inline-flex align-items-center justify-content-center mb-4 p-3"
                            style="width: 70px; height: 70px;">
                            <i class="fas fa-clipboard-list text-teal-600 fs-3"></i>
                        </div>
                        <h3 class="h5 font-weight-bold text-gray-800 mb-3">Create Profile</h3>
                        <p class="text-gray-600 mb-0">
                            Set up your professional profile with credentials and specialties.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card h-100 border-0 shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-1"
                    style="    border-radius: 20px;
    background-color: #f6f9ff;">
                    <div class="card-body text-center p-5">
                        <div class="position-absolute top-0 start-0 translate-middle bg-teal-600 text-white rounded-circle d-flex align-items-center justify-content-center shadow-sm"
                            style="background-color: #4f46e5; width: 32px; height: 32px; font-weight: 600;">
                            3
                        </div>
                        <div class="bg-teal-50 rounded-circle d-inline-flex align-items-center justify-content-center mb-4 p-3"
                            style="width: 70px; height: 70px;">
                            <i class="fas fa-cloud-upload-alt text-teal-600 fs-3"></i>
                        </div>
                        <h3 class="h5 font-weight-bold text-gray-800 mb-3">Upload Documents</h3>
                        <p class="text-gray-600 mb-0">
                            Securely submit your licenses and certifications.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card h-100 border-0 shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-1"
                    style="    border-radius: 20px;
    background-color: #f6f9ff;">
                    <div class="card-body text-center p-5">
                        <div class="position-absolute top-0 start-0 translate-middle bg-teal-600 text-white rounded-circle d-flex align-items-center justify-content-center shadow-sm"
                            style="width: 32px; height: 32px; font-weight: 600; background-color: #4f46e5">
                            4
                        </div>
                        <div class="bg-teal-50 rounded-circle d-inline-flex align-items-center justify-content-center mb-4 p-3"
                            style="width: 70px; height: 70px;">
                            <i class="fas fa-phone-alt text-teal-600 fs-3"></i>
                        </div>
                        <h3 class="h5 font-weight-bold text-gray-800 mb-3">Verification Call</h3>
                        <p class="text-gray-600 mb-0">
                            Complete a quick verification call with our team.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="bg-gray-50 py-16">
    <div class="container">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-4 text-gray-900">
                Choose Your <span class="text-teal-600">Duluth Plan</span>
            </h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Flexible pricing plans tailored for nurses, clinics, and healthcare providers.
            </p>
        </div>
        <div class="row justify-content-center">
            <!-- Basic Plan -->
            <div class="col-12 col-md-4 mb-4">
                <div class="card border-0 shadow-lg h-100" style="border-radius: 20px;">
                    <div class="card-body text-center p-5">
                        <h3 class="h4 font-weight-bold text-teal-600 mb-3">Starter</h3>
                        <p class="text-gray-600">Ideal for individual nurses</p>
                        <h4 class="h2 my-4">$19<span class="text-sm text-gray-500">/month</span></h4>
                        <ul class="list-unstyled mb-4 text-gray-700">
                            <li>✔ 1 User Account</li>
                            <li>✔ Profile & Credential Management</li>
                            <li>✔ Support Access</li>
                        </ul>
                        <a href="#" class="btn btn-teal w-100 text-white" style="background-color: #4f46e5;">Get Started</a>
                    </div>
                </div>
            </div>
            <!-- Professional Plan -->
            <div class="col-12 col-md-4 mb-4">
                <div class="card border-0 shadow-lg h-100" style="border-radius: 20px;">
                    <div class="card-body text-center p-5">
                        <h3 class="h4 font-weight-bold text-teal-600 mb-3">Professional</h3>
                        <p class="text-gray-600">Great for small teams</p>
                        <h4 class="h2 my-4">$49<span class="text-sm text-gray-500">/month</span></h4>
                        <ul class="list-unstyled mb-4 text-gray-700">
                            <li>✔ Up to 5 Users</li>
                            <li>✔ Schedule & Shift Tools</li>
                            <li>✔ Email Notifications</li>
                        </ul>
                        <a href="#" class="btn btn-teal w-100 text-white" style="background-color: #4f46e5;">Upgrade</a>
                    </div>
                </div>
            </div>
            <!-- Enterprise Plan -->
            <div class="col-12 col-md-4 mb-4">
                <div class="card border-0 shadow-lg h-100" style="border-radius: 20px;">
                    <div class="card-body text-center p-5">
                        <h3 class="h4 font-weight-bold text-teal-600 mb-3">Enterprise</h3>
                        <p class="text-gray-600">Perfect for clinics & hospitals</p>
                        <h4 class="h2 my-4">$99<span class="text-sm text-gray-500">/month</span></h4>
                        <ul class="list-unstyled mb-4 text-gray-700">
                            <li>✔ Unlimited Users</li>
                            <li>✔ Full Dashboard Access</li>
                            <li>✔ Dedicated Support</li>
                        </ul>
                        <a href="#" class="btn btn-teal w-100 text-white" style="background-color: #4f46e5;">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')
{{-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.collapse-toggle').forEach(button => {
            button.addEventListener('click', function () {
                document.querySelectorAll('.jobDesc').forEach(section => {
                    if (section.classList.contains('show')) {
                        bootstrap.Collapse.getInstance(section)?.hide();
                    } else {
                        new bootstrap.Collapse(section, {
                            toggle: true
                        });
                    }
                });
            });
        });
    });
</script> --}}

{{-- <script>
    document.getElementById('getStartedBtn').addEventListener('click', function() {
        document.getElementById('registrationForm').scrollIntoView({
            behavior: 'smooth'
        });
    });

</script> --}}
<script>
    document.querySelectorAll('.scroll-to-register').forEach(function(button) {
        button.addEventListener('click', function() {
            document.getElementById('registrationForm').scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
</script>
<script>
    $('#registerForm').on('submit', function (e) {
        e.preventDefault();

        // Clear previous error messages
        $('.text-danger').remove();

        let isValid = true;

        // Validation
        const fields = ['facilityName', 'email', 'phone', 'beds', 'address'];
        fields.forEach(id => {
            const value = $('#' + id).val().trim();
            if (!value) {
                isValid = false;
                $('#' + id).after(`<div class="text-danger mt-1">This field is required.</div>`);
            }
        });
         const website = $('#website').val().trim();
            if (website) {
                const urlPattern = /^(https?:\/\/)?([\w\-]+\.)+[a-zA-Z]{2,}(\/[^\s]*)?$/;
                if (!urlPattern.test(website)) {
                    isValid = false;
                    $('#website').after(`<div class="text-danger mt-1">Please enter a valid URL.</div>`);
                }
            }

        if (!$('#terms').is(':checked')) {
            isValid = false;
            $('#terms').parent().append(`<div class="text-danger mt-1">You must agree to the terms.</div>`);
        }

        if (!isValid) return;
    const $submitBtn = $(this).find('button[type="submit"]');
    $submitBtn.prop('disabled', true).text('Submitting...');
       let form = $(this);
            let formData = new FormData(this);
        $.ajax({
    url: '/companies/store',
    method: 'POST',
    data: formData,
    processData: false,
    contentType: false,
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function() {
        alert('Facility registered successfully!');
        $('#registerForm')[0].reset();
    },
    error: function(xhr) {
        let response = xhr.responseJSON;
        if (response && response.errors) {
            for (const [field, messages] of Object.entries(response.errors)) {
                const fieldId = field === 'facility_name' ? 'facilityName' : field;
                $(`#${fieldId}`).after(`<div class="text-danger mt-1">${messages[0]}</div>`);
            }
        } else {
            alert('Something went wrong. Please try again.');
        }
    },
    complete: function() {
        $submitBtn.prop('disabled', false).text('Register Facility');
    }
});
    });
</script>

@endsection

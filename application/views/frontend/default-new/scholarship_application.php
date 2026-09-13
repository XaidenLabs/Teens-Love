<style>
.scholarship-bg {
    padding: 20px;
    font-family: 'Inter', sans-serif;
}
.multi-step-form {
    background: #ffffff;
    border-radius: 24px;
    padding: 20px 30px;
    box-shadow: none;
    max-width: 100%;
    margin: 0 auto;
    position: relative;
}

.form-title {
    text-align: center;
    font-weight: 700;
    color: #333;
    margin-bottom: 30px;
    font-size: 24px;
}
.step-header {
    display: flex;
    justify-content: space-between;
    position: relative;
    margin-bottom: 50px;
    text-align: center;
}
.step-header::before {
    content: '';
    position: absolute;
    top: 15px;
    left: 15%;
    right: 15%;
    height: 2px;
    background: #e0e0e0;
    z-index: 0;
}
.step-indicator {
    position: relative;
    z-index: 1;
    background: #fff;
    padding: 0 10px;
    flex: 1;
}
.step-circle {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: #e0e0e0;
    color: #777;
    line-height: 32px;
    margin: 0 auto 10px;
    font-weight: bold;
    font-size: 14px;
    transition: all 0.3s;
}
.step-indicator.active .step-circle, .step-indicator.completed .step-circle {
    background: #00208A;
    color: #fff;
    box-shadow: 0 4px 10px rgba(0, 32, 138, 0.3);
}
.step-label {
    font-size: 12px;
    color: #777;
    font-weight: 600;
}
.step-indicator.active .step-label {
    color: #00208A;
}
.form-step {
    display: none;
}
.form-step.active {
    display: block;
    animation: fadeIn 0.4s ease-in-out;
}
@keyframes fadeIn {
    from { opacity: 0; transform: translateX(20px); }
    to { opacity: 1; transform: translateX(0); }
}
.form-label {
    font-size: 12px;
    font-weight: 600;
    color: #555;
    margin-bottom: 6px;
    text-transform: capitalize;
}
.form-control, .form-select {
    background: #f4f6f8;
    border: 1px solid #edf1f5;
    border-radius: 10px;
    padding: 12px 15px;
    font-size: 14px;
    color: #333;
    transition: all 0.3s;
}
.form-control:focus, .form-select:focus {
    background: #fff;
    border-color: #00AEEF;
    box-shadow: 0 0 0 3px rgba(0,174,239,0.1);
}
.photo-upload-wrapper {
    text-align: center;
    margin-bottom: 20px;
}
.photo-upload-circle {
    width: 90px;
    height: 90px;
    border-radius: 50%;
    background: #00208A;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 30px;
    margin: 0 auto 10px;
    cursor: pointer;
    overflow: hidden;
    position: relative;
    box-shadow: 0 5px 15px rgba(0, 32, 138, 0.3);
}
.photo-upload-circle input[type="file"] {
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 100%;
    opacity: 0;
    cursor: pointer;
}
.photo-upload-circle img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: none;
    position: absolute;
    top: 0; left: 0;
}
.upload-text {
    font-size: 12px;
    color: #333;
    font-weight: 600;
}
.btn-primary-custom {
    background: #E30613;
    color: #fff;
    border: none;
    border-radius: 30px;
    padding: 12px 40px;
    font-weight: 600;
    font-size: 14px;
    transition: all 0.3s;
}
.btn-primary-custom:hover {
    background: #c20410;
    color: #fff;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(227, 6, 19, 0.4);
}
.btn-light-custom {
    background: #f4f6f8;
    color: #555;
    border: none;
    border-radius: 30px;
    padding: 12px 40px;
    font-weight: 600;
    font-size: 14px;
    transition: all 0.3s;
}
.btn-light-custom:hover {
    background: #e2e6ea;
    color: #333;
}
.radio-group {
    display: flex;
    gap: 15px;
    padding-top: 10px;
}
.custom-radio {
    display: flex;
    align-items: center;
    cursor: pointer;
    font-size: 14px;
    color: #555;
}
.custom-radio input {
    margin-right: 8px;
    accent-color: #00208A;
}
.section-title {
    font-size: 18px;
    font-weight: 700;
    color: #333;
    margin-bottom: 20px;
}
</style>

<div class="scholarship-bg">
    <div class="multi-step-form">
        <h2 class="form-title"><?php echo get_phrase('Scholarship Application'); ?></h2>
        
        <div class="step-header">
            <div class="step-indicator active" id="indicator-1">
                <div class="step-circle">1</div>
                <div class="step-label">Personal Biodata</div>
            </div>
            <div class="step-indicator" id="indicator-2">
                <div class="step-circle">2</div>
                <div class="step-label">Academic & Financial</div>
            </div>
            <div class="step-indicator" id="indicator-3">
                <div class="step-circle">3</div>
                <div class="step-label">Faith & Commitment</div>
            </div>
            <div class="step-indicator" id="indicator-4">
                <div class="step-circle">4</div>
                <div class="step-label">Goals & Declaration</div>
            </div>
        </div>

        <?php if($this->session->flashdata('flash_message')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo $this->session->flashdata('flash_message'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <?php if($this->session->flashdata('error_message')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $this->session->flashdata('error_message'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <form action="<?php echo site_url('scholarship/submit'); ?>" method="post" enctype="multipart/form-data" id="scholarshipForm">
            
            <!-- Step 1: Personal Biodata -->
            <div class="form-step active" id="step-1">
                <h4 class="section-title">Personal Biodata</h4>
                <div class="row">
                    <div class="col-md-9">
                        <div class="mb-3">
                            <label class="form-label">Full Name (Surname First)</label>
                            <input type="text" name="full_name" class="form-control" placeholder="Enter Full Name" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Date of Birth</label>
                                <input type="date" name="dob" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Gender</label>
                                <div class="radio-group">
                                    <label class="custom-radio">
                                        <input type="radio" name="gender" value="Male" required> Male
                                    </label>
                                    <label class="custom-radio">
                                        <input type="radio" name="gender" value="Female" required> Female
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nationality</label>
                            <input type="text" name="nationality" class="form-control" placeholder="E.g. Nigerian" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Residential Address</label>
                            <input type="text" name="residential_address" class="form-control" placeholder="Enter full address" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Phone Number</label>
                                <input type="text" name="phone" class="form-control" placeholder="+234..." required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">WhatsApp Number</label>
                                <input type="text" name="whatsapp" class="form-control" placeholder="+234..." required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-control" placeholder="example@mail.com" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="photo-upload-wrapper mt-3">
                            <div class="photo-upload-circle">
                                <i class="fas fa-camera"></i>
                                <input type="file" name="passport_photo" accept="image/*" onchange="previewImage(this)" required>
                                <img id="photo-preview" src="" alt="">
                            </div>
                            <span class="upload-text">Attach Passport</span>
                        </div>
                    </div>
                </div>
                
                <div class="text-center mt-4">
                    <button type="button" class="btn btn-primary-custom" onclick="nextStep(2)">Save & Continue</button>
                </div>
            </div>

            <!-- Step 2: Academic & Financial -->
            <div class="form-step" id="step-2">
                <h4 class="section-title">Academic & Financial Information</h4>
                <div class="mb-3">
                    <label class="form-label">1. Why are you applying for the TLF Scholarship Programme? (Max 200 words)</label>
                    <textarea name="why_applying" class="form-control" rows="3" placeholder="Type here..." required></textarea>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">2. Scholarship Pathway</label>
                        <select name="scholarship_pathway" class="form-select" required>
                            <option value="">- Select -</option>
                            <option value="University Pathway (JAMB Registration Support)">University Pathway (JAMB Registration Support)</option>
                            <option value="Skills Acquisition Scholarship">Skills Acquisition Scholarship</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">3. Intended Course / Skill (Max 150 words)</label>
                        <input type="text" name="intended_course" class="form-control" placeholder="Course or skill and why you chose it" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">4. Describe your family's current financial situation and explain why you need this scholarship. (Max 250 words)</label>
                    <textarea name="financial_situation" class="form-control" rows="3" placeholder="Type here..." required></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">5. What are your academic achievements or strengths? (Include results, awards, etc.)</label>
                    <textarea name="academic_achievements" class="form-control" rows="3" placeholder="Type here..." required></textarea>
                </div>
                
                <div class="text-center mt-4 d-flex justify-content-center gap-3">
                    <button type="button" class="btn btn-light-custom" onclick="prevStep(1)">Back</button>
                    <button type="button" class="btn btn-primary-custom" onclick="nextStep(3)">Save & Continue</button>
                </div>
            </div>

            <!-- Step 3: Faith & Commitment -->
            <div class="form-step" id="step-3">
                <h4 class="section-title">Faith & Commitment</h4>
                <div class="mb-3">
                    <label class="form-label">6. Tell us about your Christian faith and how it influences your daily life. (Max 200 words)</label>
                    <textarea name="christian_faith" class="form-control" rows="3" placeholder="Type here..." required></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">7. The TLF Scholarship requires attendance at at least 20 REDD Interactive Forum sessions and active participation in mentorship. Are you willing to commit?</label>
                    <div class="radio-group mb-2">
                        <label class="custom-radio">
                            <input type="radio" name="redd_commitment" value="Yes" required> Yes
                        </label>
                        <label class="custom-radio">
                            <input type="radio" name="redd_commitment" value="No" required> No
                        </label>
                    </div>
                    <textarea name="redd_commitment_details" class="form-control mt-2" rows="2" placeholder="If yes, explain how you plan to stay committed." required></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">8. Have you ever participated in community service, church activities, leadership programmes, or volunteer work? Briefly describe.</label>
                    <textarea name="community_service" class="form-control" rows="3" placeholder="Type here..." required></textarea>
                </div>
                
                <div class="text-center mt-4 d-flex justify-content-center gap-3">
                    <button type="button" class="btn btn-light-custom" onclick="prevStep(2)">Back</button>
                    <button type="button" class="btn btn-primary-custom" onclick="nextStep(4)">Save & Continue</button>
                </div>
            </div>

            <!-- Step 4: Goals & Declaration -->
            <div class="form-step" id="step-4">
                <h4 class="section-title">Goals & Declaration</h4>
                <div class="mb-3">
                    <label class="form-label">9. Where do you see yourself in five years, and how will this scholarship help you achieve your goals? (Max 250 words)</label>
                    <textarea name="five_year_goal" class="form-control" rows="3" placeholder="Type here..." required></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">10. Why do you believe you should be selected over other applicants? (Max 200 words)</label>
                    <textarea name="why_select_you" class="form-control" rows="3" placeholder="Type here..." required></textarea>
                </div>
                
                <div class="mt-4 p-3 rounded" style="background: #f9f9f9; border-left: 4px solid #00208A;">
                    <h5 class="mb-3" style="font-size: 14px; font-weight: 700;">Declaration</h5>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="decl1" required>
                        <label class="form-check-label" for="decl1" style="font-size: 13px;">I certify that all the information provided in this application is true and accurate.</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="decl2" required>
                        <label class="form-check-label" for="decl2" style="font-size: 13px;">I understand that providing false information may result in disqualification.</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="decl3" required>
                        <label class="form-check-label" for="decl3" style="font-size: 13px;">I agree to abide by all the rules, regulations, and terms of the TLF Scholarship Programme if selected.</label>
                    </div>
                </div>
                
                <div class="text-center mt-4 d-flex justify-content-center gap-3">
                    <button type="button" class="btn btn-light-custom" onclick="prevStep(3)">Back</button>
                    <button type="submit" class="btn btn-primary-custom">Submit Application</button>
                </div>
            </div>

        </form>
    </div>
</div>

<script>
function nextStep(step) {
    // Basic validation before moving next
    let currentStepId = step - 1;
    let inputs = document.getElementById('step-' + currentStepId).querySelectorAll('[required]');
    let isValid = true;
    
    inputs.forEach(input => {
        if (!input.value) {
            isValid = false;
            input.style.borderColor = 'red';
        } else {
            input.style.borderColor = '#edf1f5';
        }
    });
    
    if(!isValid) {
        alert("Please fill all required fields before proceeding.");
        return;
    }

    // Hide all steps
    document.querySelectorAll('.form-step').forEach(el => el.classList.remove('active'));
    // Show target step
    document.getElementById('step-' + step).classList.add('active');
    
    // Update indicators
    document.getElementById('indicator-' + currentStepId).classList.add('completed');
    document.getElementById('indicator-' + currentStepId).classList.remove('active');
    document.getElementById('indicator-' + step).classList.add('active');
}

function prevStep(step) {
    let currentStepId = step + 1;
    // Hide all steps
    document.querySelectorAll('.form-step').forEach(el => el.classList.remove('active'));
    // Show target step
    document.getElementById('step-' + step).classList.add('active');
    
    // Update indicators
    document.getElementById('indicator-' + currentStepId).classList.remove('active');
    document.getElementById('indicator-' + step).classList.remove('completed');
    document.getElementById('indicator-' + step).classList.add('active');
}

function previewImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            const img = document.getElementById('photo-preview');
            img.src = e.target.result;
            img.style.display = 'block';
        }
        reader.readAsDataURL(input.files[0]);
    }
}

document.getElementById('scholarshipForm').addEventListener('submit', function(e) {
    e.preventDefault();
    let formData = new FormData(this);
    let submitBtn = this.querySelector('button[type="submit"]');
    let originalText = submitBtn.innerHTML;
    submitBtn.innerHTML = 'Submitting...';
    submitBtn.disabled = true;

    fetch(this.action, {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            if(typeof $('#modal_ajax').modal === 'function') {
                $('#modal_ajax').modal('hide');
            }
            if (typeof toastr !== 'undefined') {
                toastr.success(data.message);
            } else {
                alert(data.message);
            }
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred during submission.');
    })
    .finally(() => {
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;
    });
});
</script>

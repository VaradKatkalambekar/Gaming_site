<!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sign Up for an Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/app/partials/_handleSignup.php" method="post">
                    <div class="mb-3">
                        <label for="Org_name" class="form-label">Organization Name</label>
                        <input type="text" class="form-control" id="Org_name" name="Org_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="Org_owner" class="form-label">Org Owner Name</label>
                        <input type="text" class="form-control" id="Org_owner" name="Org_owner" required>
                    </div>
                    <div class="mb-3">
                        <label for="Org_username" class="form-label">Enter Your Username</label>
                        <textarea class="form-control" id="Org_username" name="Org_username" rows="1" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="Mobile_num" class="form-label">Mobile Number <em> whatsapp
                                preffered</em></label>
                        <input type="tel" class="form-control" id="Mobile_num" name="Mobile_num"
                            placeholder="9404881673" pattern="[0-9]{10}" required>
                    </div>
                    <div class="mb-3">
                        <label for="Org_email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="Org_email" name="Org_email"
                            aria-describedby="emailHelp" required>
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="discord" class="form-label">Please Enter the link to your Discord Server</label>
                        <input type="text" class="form-control" id="discord" name="discord" required>
                    </div>
                    <div class="mb-3">
                        <label for="instagram" class="form-label">Please Enter the link to your Instagram</label>
                        <input type="text" class="form-control" id="instagram" name="instagram" required>
                    </div>
                    <div class="mb-3">
                        <label for="youtube" class="form-label">Please Enter the link to your Youtube</label>
                        <input type="text" class="form-control" id="youtube" name="youtube" required>
                    </div>
                    <div class="mb-3 my-3">
                        <label for="pass" class="form-label">Set up your UPYO Password</label>
                        <input type="password" class="form-control" id="pass" name="pass" required>
                    </div>
                    <div class="mb-3">
                        <label for="cpass" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="cpass" name="cpass" required>
                    </div>
                    <button type="submit" class="btn btn-warning">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
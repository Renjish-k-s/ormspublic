<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Reviewer Account</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body{
      background-color: #f7f7f7;
    }
    .content {
      background-color: #f8f9fa; /* Light gray background */
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }
    .btn-sm {
      padding: 5px 10px;
      font-size: 0.875rem; /* Slightly smaller font size */
    }
  </style>
</head>
<body>
<div class="d-flex align-items-center" style="min-height: 100vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="content">
                    <h2 class="text-center">Create Reviewer Account</h2>
                    <form>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="firstName">First Name</label>
                          <input type="text" class="form-control" id="firstName" placeholder="Enter first name*" required>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="lastName">Last Name</label>
                          <input type="text" class="form-control" id="lastName" placeholder="Enter last name*" required>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="email">Email ID</label>
                          <input type="email" class="form-control" id="email" placeholder="Enter email ID*" required>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="password">Set Password</label>
                          <input type="password" class="form-control" id="password" placeholder="Set password*" required>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="cvUpload">Upload CV</label>
                          <input type="file" class="form-control-file" id="cvUpload" required>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="specialDocUpload">Upload Special Document</label>
                          <input type="file" class="form-control-file" id="specialDocUpload" required>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="col-md-6">
                          <button type="submit" class="btn btn-primary btn-sm btn-block">Create Reviewer</button>
                        </div>
                        <div class="col-md-6">
                          <button type="reset" class="btn btn-secondary btn-sm btn-block">Reset</button>
                        </div>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

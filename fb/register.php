<?php include "config/config.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= PROJECT_NAME; ?> </title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-200 flex justify-center items-center min-h-screen">
    <!-- Header Include -->
    <?php include_once "include/header.php"; ?>

    <!-- Centered Container for Form -->
    <div class="w-full max-w-md mx-auto bg-white shadow-lg border border-gray-200 rounded-lg p-6">
        <h2 class="text-2xl font-bold mb-5">Create an New Account</h2>
        <form action="" method="POST">
            <div class="grid grid-cols-2 gap-4">
                <div class="form-group">
                    <label for="fname" class="block mb-2 text-sm font-medium text-gray-900">First Name</label>
                    <input type="text" name="fname" id="fname" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="e.g., John">
                </div>
                <div class="form-group">
                    <label for="lname" class="block mb-2 text-sm font-medium text-gray-900">Surname</label>
                    <input type="text" name="lname" id="lname" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="e.g., Doe">
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                <input type="email" name="email" id="email" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="username@example.com">
            </div>
            <div class="form-group">
                <label for="contact" class="block mb-2 text-sm font-medium text-gray-900">Contact</label>
                <input type="tel" name="contact" id="contact" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="e.g., 9999999999">
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="form-group">
                    <label for="gender" class="block mb-2 text-sm font-medium text-gray-900">Gender</label>
                    <select id="gender" name="gender" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="">Select Gender</option>
                        <option value="m">Male</option>
                        <option value="f">Female</option>
                        <option value="o">Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="dob" class="block mb-2 text-sm font-medium text-gray-900">Date of Birth</label>
                    <input type="date" name="dob" id="dob" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                <input type="password" name="password" id="password" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </div>
            <div class="flex justify-end mt-4">
                <button type="submit" name="create" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Create an Account
                </button>
            </div>
        </form>
    </div>
</body>
</html>

  <?php
  //create account work
  if(isset($_POST['create'])){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $dob=$_POST['dob'];
    $password=md5($_POST['password']);
    $email=$_POST['email'];
    $contact=$_POST['contact'];
    $gender=$_POST['gender'];

    $query = mysqli_query($connect, "insert into accounts (fname, lname, dob, password, email, contact, gender)value ('$fname','$lname','$dob','$password','$email','$contact','$gender')");

    if($query){
      $_SESSION['account']= $email;
      redirect('mail/inbox.php');
    }
    else{
      alert('failed to create an account try again');
      redirect('login.php');
    }
  }
  ?>
       </div>
    </div>
</div>
</body>
</html>
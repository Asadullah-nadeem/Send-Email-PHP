<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Mail Form</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.3/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
        <h1 class="mb-4 text-xl text-blue-500 font-bold"> Send Mail To Gmail</h1>
        <form method="POST" action="send_email.php" class="flex flex-col space-y-4">
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email:</label>
                <input  type="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="youremail@gmail.com" required="required">
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="subject">Subject</label>
                <input  type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Your subject here" required="required">
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="message">Message</label>
                <textarea  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" rows="3" placeholder="Your message here" required="required"></textarea>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-flex items-center">
                <i class="fas fa-envelope mr-2"></i>
                <span>Send</span>
            </button>
        </form>
        <br />

        <div id="confirmationMessage" class="mt-4 hidden bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
            <p class="font-bold">Message has been sent</p>
        </div>
    </div>
    <?php
				if(ISSET($_SESSION['status'])){
					if($_SESSION['status'] == "ok"){
			?>
						<div class="alert alert-info"><?php echo $_SESSION['result']?></div>
			<?php
					}else{
			?>
						<div class="alert alert-danger"><?php echo $_SESSION['result']?></div>
			<?php
					}
					
					unset($_SESSION['result']);
					unset($_SESSION['status']);
				}
			?>
    <script>
        const form = document.getElementById("sendMailForm");
        const confirmationMessage = document.getElementById("confirmationMessage");

        form.addEventListener("submit", function(event) {
            event.preventDefault();
            confirmationMessage.classList.remove("hidden");
            setTimeout(() => confirmationMessage.classList.add("hidden"), 3000);
        });
    </script>
</body>
</html>

<?php
	// Message Vars
	$errName = '';
	$errEmail = '';
	$errVerEmail = '';
	$errPhone = '';
	$errSubject = '';
	$errMessage = '';

	// Check For Submit
	if(isset($_POST["submit"])) {
		// Get Form Data
		$name = htmlspecialchars($_POST['name']);
		$email = htmlspecialchars($_POST['email']);
		$email = str_replace(' ', '', $email); // removes spaces.
		$verEmail = htmlspecialchars($_POST['verEmail']);
		$verEmail = str_replace(' ', '', $verEmail); // removes spaces.
		$phone = htmlspecialchars($_POST['phone']);
		$phone = str_replace(' ', '', $phone); // removes spaces.
		$phone = str_replace('.', '', $phone); // removes dots.
		$subject = htmlspecialchars($_POST['subject']);
		$message = htmlspecialchars($_POST['message']);

		// Check the validity required fields have been filled out
		if(empty($name)) {
			$errName = "Please enter your name.";
		}
		if(empty($email) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = "Please enter a valid email address.";
		}
		if($verEmail != $email) {
			$errVerEmail = "The email addresses you entered do not match.";
		}
		if(empty($phone) || !is_numeric($phone)) {
			$errPhone = "Please enter a phone number. Input can only contain numbers.";
		}
		if(empty($subject)) {
			$errSubject = "Please enter a subject.";
		}
		if(empty($message)) {
			$errMessage = "Please enter your message.";
		}

		// If there are no errors, send the email
		if (!$errName && !$errEmail && !$errVerEmail && !$errPhone && !$errSubject && !$errMessage) {
			// Email addresses to be entered on next line
			$to = ""; // Destination email address.
			$subjectTitle = "Contact Request [Re: " . $subject . "]";
			$formContent = "From: $name \nEmail: $email \nPhone: $phone \nSubject: $subject \n\nMessage: $message";
			if (mail($to, $subjectTitle, $formContent)) {
				echo $result='<div class="alert alert-success">Success! Thanks for your message. We will be in touch shortly.</div>';
			} else {
				echo $result='<div class="alert alert-danger">Error! Sorry there was an error sending your message. Please try again later.</div>';
			}
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>MacWay Ltd</title>
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> <!-- Twitter Boostrap Framework -->
</head>
<body>
  <main role="main">
    <header>
      <div class="container">
        <div id="logo">
          <img src="./image/macway-transparent.png">
        </div>
        <nav>
          <ul>
            <li><a href="#contact">Contact</a></li>
            <li>|</li>
            <li><a href="#about-showcase">About</a></li>
            <li>|</li>
            <li><a href="#featured-work">Our Work</a></li>
            <li>|</li>
            <li><a href="#testimonials-showcase">Testimonials</a></li>
          </ul>
        </nav>
      </div>
    </header>

    <!-- Main showcase -->
    <section class="showcase" id="display-showcase">
      <div class="container">
        <div class="col-sm-6 display-text showcase-img-bg"><h1>Kia ora</h1>
          <p>MacWay design scales which are user friendly, durable and reliable
            to satisfy the needs of our customers.</p>
          <p><a class="btn btn-success btn-lg" href="#contact" role="button">Contact &raquo;</a></p>
        </div>
      </div>
    </section>

    <!-- Contact Form -->
    <section class="contact" id="contact">
      <div class="container">
        <div class="display-text">
          <h1 class="text-center">Get In Touch</h1>
          <!-- <p class="form_container">We are here to answer any queries you may have or feedback you may have about our business. Fill out the contact form below and we will respond as soon as we can.</p> -->
        </div>
        <div class="form_container">
          <form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
              <label for="name">Name *</label>
              <input type="text" name="name" class="form-control" placeholder="Enter your name here.." value="<?php echo isset($_POST['name']) ? $name : ''; ?>">
    					<span class="text-danger"> <?php echo $errName;?></span>
            </div>
            <div class="form-group">
              <label for="email">Email *</label>
              <input type="text" name="email" class="form-control" placeholder="Enter your email here.." value="<?php echo isset($_POST['email']) ? $email : ''; ?>">
    					<span class="text-danger"> <?php echo $errEmail;?></span>
            </div>
    				<div class="form-group">
    					<label for="email">Verify Email *</label>
    					<input type="text" name="verEmail" class="form-control" placeholder="Re-enter email here.." value="<?php echo isset($_POST['email']) ? $verEmail : ''; ?>">
    					<span class="text-danger"> <?php echo $errVerEmail;?></span>
    				</div>
    				<div class="form-group">
              <label for="phone">Phone *</label>
              <input type="text" name="phone" class="form-control" placeholder="Enter your phone number here.." value="<?php echo isset($_POST['phone']) ? $phone : ''; ?>">
    					<span class="text-danger"> <?php echo $errPhone;?></span>
            </div>
            <div class="form-group">
              <label for="subject">Subject *</label>
              <input type="text" name="subject" class="form-control" placeholder="Enter your subject here.." value="<?php echo isset($_POST['subject']) ? $subject : ''; ?>">
    					<span class="text-danger"> <?php echo $errSubject;?></span>
            </div>
            <div class="form-group">
    	      	<label for="message">Message *</label>
    	      	<textarea name="message" class="form-control" placeholder="Enter your message here.."><?php echo isset($_POST['message']) ? $message : ''; ?></textarea>
    					<span class="text-danger"> <?php echo $errMessage;?></span>
    	      </div>
    	      <a name="submit" href="#contact" role="button" class="btn btn-primary submit">Submit</a> <!-- submit class for padding. -->
          </form>
        </div>
      </div> <!-- /Container -->
    </section>

    <!-- About Showcase -->
    <section class="showcase" id="about-showcase">
      <div class="container">
        <div class="col-sm-6 col-sm-push-6 display-text showcase-img-bg">
          <h1>About</h1>
          <p>MacWay offer standard industry weighing products, custom build
            solutions, repair service contracts and yearly weights and measures
            calibrations. We also specialise in supporting marine motion
            compensated weighing equipment and scales for the fishing industry.
          </p>
          <p>Our team has a diverse range of high tech skills required for
            design/build projects. This includes process automation and machine
            integration with PLC’s and software programming. We design and
            build complete packing and integrated processing lines, with all
            the resources to provide a complete solution. Lines can include
            existing machinery or parts of existing machinery. We can also
            rebuild or update the controls of older weighing type equipment,
            integrating the overall line into one system.</p>
          <p>We take pride in our innovation and technical expertise, customer
            service and product knowledge. Our client’s success is important to
            us.</p>
        </div>
      </div>
    </section>

    <!-- Featured Work -->
    <div id="featured-work" class="container">
      <div class="display-text">
        <h1 class="text-center">Featured Work</h1>
      </div>
      <div class="boxes">
        <div class="box box-3">
          <div class="hovereffect">
            <img class="img-responsive" src="./image/scales.jpg" alt="">
            <div class="overlay">
               <h2>Abacus Fisheries</h2>
            </div>
          </div>

          <div class="work-text">
            <h2>Abacus Fisheries</h2>
            <div id="content-1">
              <p>Abacus Fisheries catch, process and market seafood from Shark Bay, Western Australia. The unique Abacus Blue Swimmer Crab is currently caught and harvested daily. However, in the recent past Abacus have been missing a functioning weigh grader, packing system and data collection component inside their processing factory.</p>
              <p>After two phone calls and a few emails, MacWay and Abacus owner, Peter Jecks had a full design and build solution agreed upon. A straightforward upgrade to the exclusive MacWay MW1400 grading/batching system was successfully implemented within two days of arriving on site. The challenging part of this job was the custom built data collection software already installed inside the factory. However, we successfully managed to emulate the system communications and thus saved Peter from purchasing brand new software. The resulting new system offers more features and flexibility than before and is servicable for many years to come.</p>
            </div>
            <p><a id="view-1" role="button">Read More &raquo;</a></p>
          </div>
        </div>

        <div class="box box-3">
          <div class="hovereffect">
            <img class="img-responsive" src="./image/scales2.jpg" alt="">
            <div class="overlay">
               <h2>Work Example 2</h2>
            </div>
          </div>

          <div class="work-text">
            <h2>Work Example 2</h2>
            <div id="content-2">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam voluptatum quasi consectetur reprehenderit rerum voluptate quas deserunt eaque ut doloribus distinctio rem magnam asperiores praesentium dolor fugit tenetur maiores eius modi, alias pariatur minima beatae. Commodi nesciunt, tenetur dignissimos corrupti!</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam voluptatum quasi consectetur reprehenderit rerum voluptate quas deserunt eaque ut doloribus distinctio rem magnam asperiores praesentium dolor fugit tenetur maiores eius modi, alias pariatur minima beatae. Commodi nesciunt, tenetur dignissimos corrupti!</p>
            </div>
            <p><a id="view-2" role="button">Read More &raquo;</a></P>
          </div>
        </div>
        <div class="box box-3">
          <div class="hovereffect">
            <img class="img-responsive" src="./image/scale.jpg" alt="">
            <div class="overlay">
               <h2>Work Example 3</h2>
            </div>
          </div>

          <div class="work-text">
            <h2>Work Example 3</h2>
            <div id="content-3">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam voluptatum quasi consectetur reprehenderit rerum voluptate quas deserunt eaque ut doloribus distinctio rem magnam asperiores praesentium dolor fugit tenetur maiores eius modi, alias pariatur minima beatae. Commodi nesciunt, tenetur dignissimos corrupti!</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam voluptatum quasi consectetur reprehenderit rerum voluptate quas deserunt eaque ut doloribus distinctio rem magnam asperiores praesentium dolor fugit tenetur maiores eius modi, alias pariatur minima beatae. Commodi nesciunt, tenetur dignissimos corrupti!</p>
            </div>
            <p><a id="view-3" role="button">Read More &raquo;</a></P>
          </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Testimonials -->
    <section class="showcase" id="testimonials-showcase"> <!-- Testimonials Showcase -->
      <div class="container">
        <div class="display-text">
          <h1>Testimonials</h1>
          <p>Here's what some of our customers had to say about us.</p>
        </div>
        <div class="boxes showcase-img-bg" id="testimonial-content">
          <img src="./image/ikana.jpg" alt="Ikana NZ Ltd">
          <div class="testimonial-text">
            <h2>Ikana NZ Ltd.</h2>
            <p>
                Andrew McKenzie has been providing my business activities with scales and food processing services since the early 1990’s, with projects over a variety of industries and needs that have included intensive livestock farming and feed-milling, pork processing and seafood processing.
                Andrew has repeatedly delivered successful solutions to our challenges and opportunities and always in a very cost-effective way that is well-supported long after delivery date. Excellent weighing solutions have usually been a small part of this. Andrew has provided us with particular skills in food process control, data capture, and process flow mechanics. Always seems to pick up very quickly on your thinking and cut to the chase – easy to deal with!
            </p>
            <p>Steve Glass - 14 Feb 2018</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <footer class="container-fluid">
    <div class="container">
      <div id="footer-nav">
        <nav>
          <ul>
            <li><a href="#contact">Contact</a></li>
            <li>|</li>
            <li><a href="#about-showcase">About</a></li>
            <li>|</li>
            <li><a href="#featured-work">Our Work</a></li>
            <li>|</li>
            <li><a href="#testimonials-showcase">Testimonials</a></li>
          </ul>
        </nav>
      </div>
      <p>&copy; MacWay 2018</p>
    </div>
  </footer>

  <!-- JavaScript -->
  <script src="main.js"></script>
</body>
</html>

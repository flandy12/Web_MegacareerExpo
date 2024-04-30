<!DOCTYPE html>
<html lang="en">

<body>
    <!-- Banner area -->
    <section class="banner_area" data-stellar-background-ratio="0.5">
        <h2>Contact Us</h2>
        <ol class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li><a href="#" class="active">Contact Us</a></li>
        </ol>
    </section>
    <!-- End Banner area -->

    <!-- Map -->
    <div class="contact_map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.574058014568!2d106.8216252143403!3d-6.187711062347341!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f425e1c6c42d%3A0x3cac8e963b2e37f7!2sGedung%20Sarinah!5e0!3m2!1sid!2sid!4v1594024219380!5m2!1sid!2sid" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
    <!-- End Map -->

    <!-- All contact Info -->
    <section class="all_contact_info">
        <div class="container">
            <div class="row contact_row">
                <div class="col-sm-6 contact_info">
                    <h2>Contact Info</h2>
                    <p>Need an expert? you are more than welcomed to leave your contact info and we will be in touch shortly.</p>
                    <div class="location">
                        <div class="location_laft">
                            <a class="f_location" href="#">Location</a>
                            <a href="#">Phone</a>
                            <a href="#">Email</a>
                        </div>
                        <div class="address">
                            <a href="#">Sarinah BD floor 11 MH.Thamrin Street no.11 Jakarta Pusat, Jakarta 10350 </a>
                            <a href="#">0878-8968-8808</a>
                            <a href="#">cs@ckhelmer.co.id</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 contact_info send_message">
                    <h2>Send Us a Message</h2>
                    <form action="index.php?page=response" method="POST" class="form-inline contact_box" enctype="multipart/form-data">
                        <input type="text" class="form-control input_box" name="nama" placeholder="First Name *" required>
                        <input type="text" class="form-control input_box" name="email" placeholder="Your Email *" required>
                        <input type="text" class="form-control input_box" name="subject" placeholder="Subject" required>
                        <textarea class="form-control input_box" name="message" placeholder="Message" required></textarea>
                        <button type="submit" name="submit" class="btn btn-default">Send Message</button>
                    </form><br>
                </div>
            </div>
        </div>
    </section>
    <!-- End All contact Info -->
</body>
</html>

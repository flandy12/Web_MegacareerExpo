<!doctype html>
<html lang="en">
  <body>

    <section class="gallery" data-aos="fade-up">
      <div class="container">
          <div class="row">
              <div class="col-sm-12 heading">
                <h3>JOIN OUR EVENT</h3>
                <h4>Call All Corporate to Join Our Exhibition!</h4>
              </div>
              <div class="col-sm-12 thankyoupage">
                <br /><br />
                <h4>Thank you for your submitted your data and interest our event, please check your email<br />Our staff will contact you as soon as possible</h4>
              </div>
          </div>
      </div>
    </section>

    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo" data-aos="fade-up">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Form Exhibitor</h2>
                    <h4 class="title">Let's Join Our Event, you will feel more</h4>
                    <form action="add-exhibitor.php" method="POST" enctype="multipart/form-data">
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="COMPANY" name="txtcompany">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="PIC" name="txtpic">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="email" placeholder="EMAIL" name="txtemail">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="number" placeholder="OFFICE NUMBER" name="txttelp">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="number" placeholder="MOBILE NUMBER" name="txtmobile">
                        </div>
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="txtevent">
                                    <option disabled="disabled" selected="selected">JOIN OUR EVENT</option>
                                    <option>Mega Career Expo - Smesco | 9 - 10 September 2020</option>
                                    <option>Mega Career Expo - Landmark | 16 - 17 September 2020</option>
                                    <option>Mega Career Expo - GBK | 2 - 3 Desember 2020</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        
                        <!-- <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1 js-datepicker" type="text" placeholder="BIRTHDATE" name="birthday">
                                    <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="gender">
                                            <option disabled="disabled" selected="selected">GENDER</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                            <option>Other</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="class">
                                    <option disabled="disabled" selected="selected">CLASS</option>
                                    <option>Class 1</option>
                                    <option>Class 2</option>
                                    <option>Class 3</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div> -->
                        
                        <!-- <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="REFFERAL CODE" name="res_code">
                        </div> -->
                        
                  
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

  </body>
</html>
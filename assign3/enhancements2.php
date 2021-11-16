<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="description" content="Job Application Form of REVE" />
    <meta name="keywords" content="Job,Apply" />
    <meta name="author" content="s103512168 " />
    <link rel="stylesheet" type="text/css" href="styles/style.css" />
    <title>Enhancement2</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  </head>

  <body>

  <?php

  include('header.inc');

  ?>
    <div class="bred">
      <h1>Enhancement(2)</h1>
    </div>
    <br /><br />

    <article>
      <form
        id="form"
        method="post"
        action="http://mercury.swin.edu.au/it000000/formtest.php"
      >
        <fieldset>
          <h2>Apply for a position</h2>
          <h3>
            Please complete the form below to apply for a position with us
          </h3>
          <br /><br />

          <fieldset>
            <legend>Date of Birth</legend>
            <br /><br />

            <label for="Date">Date of Birth</label>
            <input type="date" name="DOB" id="Date" />
            <span class="required" id="datevalid"
              >Your age should between 15 to 80</span
            ><br /><br />
            <span id="error"></span>
          </fieldset>
          <br />

          <fieldset>
            <legend>Your Skills</legend>
            <br /><br />

            <label>Skills(You can choose multiple ones):</label><br /><br />
            <label
              ><input
                type="checkbox"
                name="Skills[]"
                value="Resilience"
                checked="checked"
              />Resilience</label
            >
            <label
              ><input
                type="checkbox"
                name="Skills[]"
                value="Good communication"
              />Good communication</label
            >
            <label
              ><input
                type="checkbox"
                name="Skills[]"
                value="Teamwork and interpersonal skills"
              />Teamwork and interpersonal skills</label
            >
            <label
              ><input
                type="checkbox"
                name="Skills[]"
                value="Adaptability"
              />Adaptability</label
            >
            <label
              ><input
                type="checkbox"
                name="Skills[]"
                value="Effective leadership and management."
              />Effective leadership and management.</label
            >
            <label
              ><input
                type="checkbox"
                name="Skills[]"
                value="Other Skills"
                id="otherskills"
              />Other Skills</label
            ><br /><br />

            <p>
              <label>Other Skills</label><br />
              <textarea
                rows="8"
                cols="80"
                placeholder="Write about your other skills"
                id="otherSkillsText"
              ></textarea>
            </p>

            <input type="submit" value="Apply" class="button" />
          </fieldset>
        </fieldset>
      </form>
    </article>
    <br />
    <aside>
      <br><br>
      <h2>Reference List:</h2>
      
      <p>
        Date of Birth(Age):
        <a href=https://www.w3schools.com/jquery/event_focusout.asp> Source Code</a><br>
        <a href=https://www.w3schools.com/jquery/event_focusin.asp> Source Code</a>

        <br /><br>
        Otherskill(Textarea):
        <a href=https://www.w3schools.com/jquery/event_focusout.asp> Source Code</a><br>
        <a href=https://www.w3schools.com/jquery/event_focusin.asp> Source Code</a>
        

        <br><br>
        Submit:
        <a href=https://stackoverflow.com/questions/40298052/jquery-display-alert-message-on-form-submit>Source Code</a>
      </p>
    </aside>
    <article>
      <h2>Date of Birth(Age):</h2>
      <p>
        In this webpage, I have used JQuery to determine the age limit which is between 15 and 80 years.
        In JQuery,it takes relatively less code and time in comparison to plain Javascript.When I click on the textbook of the Date of Birth
        which is identified in this webpage,then the respective box is focused with color.When I click outside the textbox,the box loses focus along with the 
        color.If it was done by plain javascript then it would have been taken relatively much more code than JQuery.
       



      </p>
      <br /><br />
      <h2>Other Skill(Text Area):</h2>
      <p>
        By using JQuery, I have focused the text area with color.When I click outside the Other Skill text area, it loses
        focus along with the color.This task of Otherskill has been done by plain javascript in apply.html.This same task is reimplemented
        using JQuery in this webpage.We have observed that JQuery is more easier to use than plain javascript.We need to 
        to write many lines of code in plain javascriptbut but it takes less lines of code in JQuery.
        In this context,JQuery is less time consuming.


        
      </p>
      <br><br>
      <h2>Submit(Apply):</h2>
      <p>
        If the applicant does not fill up the Date of Birth then the application will not be submitted at all and
        an alert message will be shown in the webpage.This task has been done by using JQuery, for which I had to
        write a minimum code than plain javascript

      </p>
    </article>
    <br><br>

    <footer>
      <div id="footerone">
        <h2>Contact Us</h2>
        <br />

        Dhanmondi,83 no. xxx Road, Mohammadpur<br />
        Tel: +8801629990000
      </div>

      <div id="footertwo">
        <h2>LIKE US ON FACEBOOK</h2>
      </div>

      <div id="footerthree">
        <h2>NEWSLETTER</h2>
        <br />
        Join our mailing list to receive news and announcements<br />
        <input type="text" /> <br />
        <button>Subscribe</button>
      </div>
    </footer>

   
    <script src="scripts/enhancements.js"></script>
  </body>
</html>

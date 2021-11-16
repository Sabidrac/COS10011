<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="description" content="Information about myself" />
    <meta name="keywords" content="Myself" />
    <meta name="author" content="s103512168" />
    <link rel="stylesheet" type="text/css" href="styles/style.css" />
    <title>A Page About Me</title>
  </head>

  <body>
    <header>

      <?php

      include('header.inc');

      ?>
    <div class="bred">
        <h1>About Me</h1>
    </div>

    <article>
      <figure >
        <img src=images/MyPhoto.jpg alt="Saborni" width="200"
        title="Filesize=81.85KB" id="image"/><br><br>
        
      </figure>
      <h2>Personal Details</h2>

      <dl>
        <dt>Name:</dt>
        <dd>Saborni Barua</dd>
        <dt>Student ID:</dt>
        <dd>103512168</dd>
        <dt>Tutor's Name:</dt>
        <dd>Guangming Cui</dd>
        <dt>Course Name:</dt>
        <dd>BA-CS-Bachelor of Computer Science</dd>
        <dt>Email</dt>
        <dd><a href="mailto:103512168@student.swin.edu.au">Student E-mail</a></dd>
      </dl><br>
      <section >
      <h2>Class Timetable</h2>
      
       <table class="center">
        <caption>
          Timetable Details
        </caption>
        <thead>
          <tr>
            <th>Monday</th>

            <th>Tuesday</th>
            <th>Wednesday</th>
            <th>Thusrsday</th>
            <th>Friday</th>
            <th>Saturday</th>
            <th>Sunday</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="one">TNE10005<br />10.00-11.00</td>
            <td class="two">COS10009<br />8.30-10.30</td>
            <td></td>
            <td class="three">COS10003<br />9.00-10.00</td>
            <td class="two">COS10009<br />12.30-14.30</td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td class="four">COS10011<br />14.00-15.00</td>
            <td class="four">COS10011<br />14.30-16.30</td>
            <td></td>
            <td class="two">COS10009<br />11.00-12.00</td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td class="one">TNE10005<br />17.30-20.30</td>
            <td></td>
            <td></td>
            <td class="three">COS10003<br />12.30-14.30</td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        </tbody>
      </table>
    </section>
      <h2 id="list">Favourites</h2>

      <ul>
        <li>
          Books
          <ul>
            <li>Harry Potter</li>
            <li>Twilight</li>
            <li>The Lord of Rings</li>
            <li>Dracula</li>
          </ul>
        </li>
        <li>
          Music
          <ul>
            <li>Attention</li>
            <li>Whats you made me do</li>
            <li>Spring Day</li>
            <li>Butter</li>
            <li>Despacito</li>
          </ul>
        </li>
        <li>
          Films
          <ul>
            <li>Jumanji</li>
            <li>Coco</li>
            <li>Jutopia</li>
            <li>3 idiots</li>
            <li>2012</li>
          </ul>
        </li>
        <li>
          Drama Series
          <ul>
            <li>Sranger Things</li>
            <li>Dark</li>
          </ul>
        </li>
      </ul>

      <hr />
    </article>
    <footer>
            <div id="footerone">
                <h2>Contact Us</h2><br>
                    
                Dhanmondi,83 no. xxx Road, Mohammadpur<br>
                    Tel: +8801629990000
            </div>

            <div id="footertwo">
                <h2>LIKE US ON FACEBOOK</h2>
                
            </div>

            <div id="footerthree">
                <h2>NEWSLETTER</h2> <br>
                Join our mailing list to receive news and announcements<br>
                <input type="text"> <br>
                <Button>Subscribe</Button>
            </div>
       
        </footer>
  </body>
</html>

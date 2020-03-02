<!DOCTYPE html>
<html>
<head>
<title>Schedule shifts</title>
<style type="text/css">
    .wrapper {
        width: 1000px;
        display: flex;
        flex-wrap: wrap;
        margin-left: 50px;
        margin-top: 20px;
      }
      .wrapper > div {
        flex: 1 1 100px;
        border: 1px solid;
      }
      .day {font-weight: bold;}
 </style>
</head>
<body>

     <h2>Edit Schedule</h2>
<div class="wrapper">
   
  <div>
      <span class="day">Monday</span><br /><br />
      <input type="checkbox" name="shifts" data-day="0" data-shift="1">Breakfast<br />
      <input type="checkbox" name="shifts" data-day="0" data-shift="2">Lunch<br />
      <input type="checkbox" name="shifts" data-day="0" data-shift="3">Dinner
  </div>
  <div>
      <span class="day">Tuesday</span><br /><br />
      <input type="checkbox" name="shifts" data-day="1" data-shift="1">Breakfast<br />
      <input type="checkbox" name="shifts" data-day="1" data-shift="2">Lunch<br />
      <input type="checkbox" name="shifts" data-day="1" data-shift="3">Dinner
  </div>
  <div>
      <span class="day">Wednesday</span><br /><br />
      <input type="checkbox" name="shifts" data-day="2" data-shift="1">Breakfast<br />
      <input type="checkbox" name="shifts" data-day="2" data-shift="2">Lunch<br />
      <input type="checkbox" name="shifts" data-day="2" data-shift="3">Dinner
  </div>
  <div>
      <span class="day">Thursday</span><br /><br />
      <input type="checkbox" name="shifts" data-day="3" data-shift="1">Breakfast<br />
      <input type="checkbox" name="shifts" data-day="3" data-shift="2">Lunch<br />
      <input type="checkbox" name="shifts" data-day="3" data-shift="3">Dinner
  </div>
  <div>
      <span class="day">Friday</span><br /><br />
      <input type="checkbox" name="shifts" data-day="4" data-shift="1">Breakfast<br />
      <input type="checkbox" name="shifts" data-day="4" data-shift="2">Lunch<br />
      <input type="checkbox" name="shifts" data-day="4" data-shift="3">Dinner
  </div>
  <div>
      <span class="day">Saturday</span><br /><br />
      <input type="checkbox" name="shifts" data-day="5" data-shift="1">Breakfast<br />
      <input type="checkbox" name="shifts" data-day="5" data-shift="2">Lunch<br />
      <input type="checkbox" name="shifts" data-day="5" data-shift="3">Dinner
  </div>
  <div>
      <span class="day">Sunday</span><br /><br />
      <input type="checkbox" name="shifts" data-day="6" data-shift="1">Breakfast<br />
      <input type="checkbox" name="shifts" data-day="6" data-shift="2">Lunch<br />
      <input type="checkbox" name="shifts" data-day="6" data-shift="3">Dinner
  </div>
 
  <div>
      <span class="day">Select Employee</span><br /><br />
      <select id="person">
          <option value="0">Mickey Mouse</option>
          <option value="1">Donald Duck</option>
          <option value="2">Goofy</option>
          <option value="3">Minnie Mouse</option>
       
          
      </select><br /> <br />
      <input type="button" value="Enter Shift" id="add_shift">
      <br />
  </div>
</div>

</body>
</html>
<script>
    const button = document.querySelector('#add_shift');
    button.addEventListener('click', addShift);
    
    function addShift () {
        var shifts = document.getElementsByName('shifts');
        for(var i = 0; i < shifts.length; i++)
        {
            if(shifts[i].checked) {
                alert (shifts[i].dataset.shift);
            }
            
        }
    }
</script>
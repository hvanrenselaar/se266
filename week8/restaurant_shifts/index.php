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
       
      }
      .wrapper > div {
        flex: 1 1 100px;
        border: 1px solid;
      }
      .day {font-weight: bold;}
      .meal {text-decoration: underline;}
      #add_shift {
          font-size: 1.2em;
          width: 200px;
      }
 </style>
</head>
<body>

     
     <div style="margin-left:50px;">
       <h2>Edit Schedule</h2>
       <label>Select Employee</label>
      <select id="person">
          <option value="1">Mickey Mouse</option>
          <option value="2">Donald Duck</option>
          <option value="3">Goofy</option>
          <option value="4">Minnie Mouse</option>
      </select>
          
      
  </div>
<div class="wrapper">
   
  <div>
      <span class="day">Monday</span><br /><br />
      <input type="checkbox" name="shifts" data-day="1" data-shift="1">Breakfast<br />
      <input type="checkbox" name="shifts" data-day="1" data-shift="2">Lunch<br />
      <input type="checkbox" name="shifts" data-day="1" data-shift="3">Dinner
  </div>
  <div>
      <span class="day">Tuesday</span><br /><br />
      <input type="checkbox" name="shifts" data-day="2" data-shift="1">Breakfast<br />
      <input type="checkbox" name="shifts" data-day="2" data-shift="2">Lunch<br />
      <input type="checkbox" name="shifts" data-day="2" data-shift="3">Dinner
  </div>
  <div>
      <span class="day">Wednesday</span><br /><br />
      <input type="checkbox" name="shifts" data-day="3" data-shift="1">Breakfast<br />
      <input type="checkbox" name="shifts" data-day="3" data-shift="2">Lunch<br />
      <input type="checkbox" name="shifts" data-day="3" data-shift="3">Dinner
  </div>
  <div>
      <span class="day">Thursday</span><br /><br />
      <input type="checkbox" name="shifts" data-day="4" data-shift="1">Breakfast<br />
      <input type="checkbox" name="shifts" data-day="4" data-shift="2">Lunch<br />
      <input type="checkbox" name="shifts" data-day="4" data-shift="3">Dinner
  </div>
  <div>
      <span class="day">Friday</span><br /><br />
      <input type="checkbox" name="shifts" data-day="5" data-shift="1">Breakfast<br />
      <input type="checkbox" name="shifts" data-day="5" data-shift="2">Lunch<br />
      <input type="checkbox" name="shifts" data-day="5" data-shift="3">Dinner
  </div>
  <div>
      <span class="day">Saturday</span><br /><br />
      <input type="checkbox" name="shifts" data-day="6" data-shift="1">Breakfast<br />
      <input type="checkbox" name="shifts" data-day="6" data-shift="2">Lunch<br />
      <input type="checkbox" name="shifts" data-day="6" data-shift="3">Dinner
  </div>
  <div>
      <span class="day">Sunday</span><br /><br />
      <input type="checkbox" name="shifts" data-day="7" data-shift="1">Breakfast<br />
      <input type="checkbox" name="shifts" data-day="7" data-shift="2">Lunch<br />
      <input type="checkbox" name="shifts" data-day="7" data-shift="3">Dinner
  </div>
 
  
</div>
   
     <div style="margin-left:50px; font-size:1.5em; margin-top:20px; width: 1000px;">
      <input type="button" value="Enter Shift" id="add_shift">
      <hr />
     </div>
    <h2>Schedule</h2>
      <div class="wrapper">
          
        <?php
            $days = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
            foreach ($days as $d) {
        ?>
        <div><span class="day"><?php echo $d;?></span></div>
        
            <?php } ?>
    </div>
    
    
    <?php
        $shifts = array ("Breakfast", "Lunch", "Dinner");
        for ($s=1; $s<=count($shifts); $s++) {
     ?>
        <div class="wrapper">
           <?php
               
               for ($d=1;$d<=count($days); $d++) {
           ?>



           <div style="height:100px;" id="<?php echo 'shift_' . $d . '_' . $s; ?>"><span class="meal"><?php echo $shifts[$s-1];?></span><br /></div>

               <?php } ?>
       </div>
    <?php } ?>
</body>
</html>
<script>
    const button = document.querySelector('#add_shift');
    button.addEventListener('click', addShifts);
    window.addEventListener('load', loadPage);
    
    function deleteShift (e) {
        
        var shift = e.target.dataset.shift;
        var day = e.target.dataset.day;
        var personId = e.target.dataset.personId;
        deleteOneShift(shift,day, personId).then (function() {
            e.target.remove();
        })
        
        
        
    }
    
    async function deleteOneShift (day, shift, id) {
        const url = 'ajax_shifts.php';
        const data = { day: day, id: id, shift: shift, action: "delete" };

        try {
          const response = await fetch(url, {
            method: 'POST', 
            body: JSON.stringify(data), 
            headers: {
              'Content-Type': 'application/json'
            }
          });
          const deleted = await response.json();
          if (deleted) {
              return (true);
          }
          
         
        } catch (error) {
            
            console.error (error);
            return (false);

        }
    }
    
    async function addOneShift (day, shift, id, name) {
        const url = 'ajax_shifts.php';
        const data = { day: day, id: id, shift: shift, action: "add" };

        try {
          const response = await fetch(url, {
            method: 'POST', 
            body: JSON.stringify(data), 
            headers: {
              'Content-Type': 'application/json'
            }
          });
          const added = await response.json();
          if (added) {
              addPersonToDOM (day, shift, id, name);
          }
         
        } catch (error) {
            console.error (error);

        }
    }
    function addPersonToDOM (day, shift, id, name) {
        var div = document.getElementById("shift_" + day + "_" + shift);
        var node = document.createElement("li");    
        node.setAttribute("data-shift", shift);
        node.setAttribute("data-day", day);
        node.setAttribute("data-person-id", id);
        node.setAttribute("data-person-name", name);

        var textnode = document.createTextNode(name);        
        node.appendChild(textnode);    
        node.addEventListener('click', deleteShift);
        div.appendChild(node); 
    }
    function addShifts () {
        // selected person
        var person = document.getElementById("person");
        var personIndex = person.selectedIndex;
        var personName = person.options[personIndex].text;
        var personId = person.options[personIndex].value;
        var shifts = document.getElementsByName('shifts');
        for(var i = 0; i < shifts.length; i++)
        {
            if(shifts[i].checked) {
                addOneShift (shifts[i].dataset.day, shifts[i].dataset.shift, personId, personName);
                shifts[i].checked = false;
            }    
        }
    }
    
     async function loadPage (event) {
        const url = 'getShifts.php';
    
        try {
            const response = await fetch(url, {
              method: 'GET'
            });
            const json = await response.json();
            for (i=0; i<json.length; i++) {
                addPersonToDOM (json[i].shiftDay, json[i].shiftNumber, json[i].employeeId,json[i].employeeName  )
            }
            
          } catch (error) {
              console.error (error);

          }
    }
</script>
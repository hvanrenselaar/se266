
    
  <h2>Search Team</h2>
  <form class="form-horizontal" action="editTeam.php" method="post">
       <label class="control-label col-sm-2" for="team name">Search by Field:</label>
       <select name="fieldName">
              <option value="">Select One</option>
              <option value="teamName">Team Name</option>
              <option value="divission">Division</option>
              
          </select>
       <input type="text" name="fieldValue" />
      <button type="submit"  name="searchTearm">Search</button>
    <br />
       <label class="control-label col-sm-2" for="team name">Sort By Field:&nbsp;&nbsp;&nbsp;</label>
       <select name="fieldName">
              <option value="">Select One</option>
              <option value="teamName">Team Name</option>
              <option value="divission">Division</option>
              
          </select>
       <input type="radio" name="fieldValue" value="ASC" selected />Ascending
       <input type="radio" name="fieldValue" value="DESC" />Ascending
       
      <button type="submit"  name="sortTeam">Sort</button>
      <br />
      
  </form>
      

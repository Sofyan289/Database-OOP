<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>Staff Panel</title>
</head>
<body>
  <h2 class="panel-title">Staff Panel</h2>
  <div class="employee-panel">
    <div class="action-block" id="cars">
      <h2>Auto's</h2>
      <div class="actions">
        <button onclick="editEntry('cars')" class="center-button">Aanpassen</button>
      </div>
      <form>
        
      </form>
    </div>

    <div class="action-block" id="customers">
      <h2>Klanten</h2>
      <div class="actions">
        <button onclick="addEntry('customers')">Toevoegen</button>
        <button onclick="editEntry('customers')">Aanpassen</button>
        <button onclick="deleteEntry('customers')">Verwijderen</button>
      </div>
      <form>
        
      </form>
    </div>
  </div>

  <script>
    function addEntry(category) {
      
      console.log('Adding entry for ' + category);
    }

    function editEntry(category) {
      
      console.log('Editing entry for ' + category);
    }

    function deleteEntry(category) {
      
      console.log('Deleting entry for ' + category);
    }
  </script>
</body>
</html>


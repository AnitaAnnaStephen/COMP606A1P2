<!-- Page to book massage by users -->
<?php
error_reporting(0);
require 'dbconnect.php';
$query = "SELECT * FROM services";
$result = mysqli_query($mysqli, $query);
?>

<!-- Page to welcome user on successful registration -->
<html>

<head>
  <title>Book Appointment</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
  <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <?php require("usertab.php"); ?>
  <style>
    .appointment {
      background-color: darkslategray;
      width: 200px;
      padding: 25px;
      border: 25px solid floralwhite;
    }

    .flex-container {
      display: flex;
      justify-content: center;
      background-color: floralwhite;
    }

    .flex-container>div {
      background-color: gray;
      width: 300px;
      margin: 40px;
      text-align: center;
      line-height: 75px;
      font-size: 30px;
    }

    table {
      border-collapse: collapse;
      width: 100%;
    }

    th,
    td {
      padding: 8px;
      text-align: center;

      border-bottom: 1px solid #ddd;
    }

    a {
      text-decoration: none;
      color: black;
    }

    a:hover {
      color: red;
    }
  </style>
</head>

<body>
  <span style="color:red;"><?php if (isset($_SESSION['message'])) {
                              echo $_SESSION['message'];
                              $_SESSION['message'] = "";;
                            }  ?></span>
  <div class="flex-container container">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Massage Type</th>
          <th>Duration</th>
          <th>Price</th>
          <th>Date</th>
          <th>Time</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = mysqli_fetch_array($result)) { ?>
          <form method="POST" action="insertbookappointment.php">
            <tr class="ptr" id="what">
              <input type="hidden" name="id" value="<?php echo $row['ServiceId'] ?>" />
              <input type="hidden" name="email" value="<?php echo $_SESSION['username']; ?>" />
              <td><input type="hidden" name="massagetype" value="<?php echo $row['MassageType'] ?>" /><?php echo $row['MassageType'] ?></td>
              <td><input type="hidden" name="duration" value="<?php echo $row['Duration'] ?>" /><?php echo $row['Duration'] ?></td>
              <td><input type="hidden" name="amount" value="<?php echo $row['Amount'] ?>" /><?php echo $row['Amount'] ?></td>
              <td><input type="date" id="date" name="date" /></td>
              <td>
                <select name="time" id="time">
                  <option value="8:00">8:00 AM</option>
                  <option value="8:35">8:35 AM</option>
                  <option value="9:10">9:10 AM</option>
                  <option value="9:45">9:45 AM</option>
                </select>
              </td>
              <td>
                <!-- <input type="Submit" value="Book" class="btn btn-dark" name="book" data-toggle="modal" data-target="#myModal"/> -->
                <button type="button" value="Book" class="btn btn-info btn-lg mmodal" data-toggle="modal" data-target="">Book</button>
              </td>
              <td>

                <!-- Modal -->
                <div class="modal fade mmmodal" id="myModal" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Modal Header</h4>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                          <label for="therapistname" name="<?php echo $row['ServiceId'] ?>">Therapist Name:</label>
                          <select name="therapist" id="therapist">
                            <?php
                              $sql = "select (SELECT concat(firstname,' ',lastname) FROM `employeedetails` where EmployeeId=therapistdetails.EmployeeId)'name',employeeid from therapistdetails where serviceid=" . $row['ServiceId'];
                              $results = mysqli_query($mysqli, $sql);

                              while ($rows = mysqli_fetch_array($results)) {
                                ?>
                              <option value=<?php echo $rows['employeeid'] ?>><?php echo $rows['name'] ?></option>
                            <?php } ?>
                          </select>
                          <br />
                          <label for="comment">Comment:</label>
                          <textarea class="form-control" rows="5" id="message" name="message"></textarea>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input type="Submit" value="Confirm" class="btn btn-dark" name="book" />
                      </div>
                    </div>

                  </div>
                </div>
                <!--endmodal-->
              </td>
            </tr>
          </form>
        <?php } ?>
      </tbody>
    </table>


  </div>
  </div>
</body>
<?php require("footer.php"); ?>

</html>
<script>
  $(document).ready(function() {
    $(document).on('click', '.mmodal', function() {
      debugger;
      var a = $(this).parents('.ptr').find('.mmmodal');
      $(a).modal('show');
    });
  });
</script>
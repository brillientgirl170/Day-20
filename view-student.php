<?php
require_once 'vendor/autoload.php';
use App\classes\student;
$massege= ' ';

if ( isset($_GET['delete']) ) {
    $id = $_GET['id'];
    $massege = student::deleteStudentInfo($id);
}

 $queryResult= student::getStudentsInfo();

//  while($Student= mysqli_fetch_assoc($queryResult)){
//      echo '<pre>';
//      print_r($Student);
//  }

?>
<hr/>
<a href="add-student.php">Add Student</a> ||
<a href="view-student.php">View Student</a>
<h1 style="color: green"><?php echo $massege; ?></h1>
<hr/>

    <table border="1" width="700">
        <tr>
            <th>ID</th>
            <th>Student Name</th>
            <th>Student Email</th>
            <th>Student Mobile</th>
            <th>Action</th>
        </tr>
        <?php while( $Student= mysqli_fetch_assoc($queryResult) ){?>
        <tr>
            <td><?php echo $Student['id']; ?></td>
            <td><?php echo $Student['name']; ?></td>
            <td><?php echo $Student['email']; ?></td>
            <td><?php echo $Student['mobile']; ?></td>
            <td style="text-align: center;">
                <a href="edit-student.php?id=<?php echo $Student['id']; ?>">Edit</a>
                <a href="?delete=true&id=<?php echo $Student['id']; ?>" onclick="return confirm('Are you sure to delete this !!!!'); ">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>


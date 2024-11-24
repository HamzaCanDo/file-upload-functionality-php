<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" 
crossorigin="anonymous"></script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

</head>
<body class="bg-gray-200 p-6">
    <div class="max-w-md mx-auto bg-white p-8 border rounded-md shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Example Form</h2>
        <?php

$name = '';
$gender = '';
$subscribe = 'No';
$datepicker = '';
$timepicker = '';
$options = [];
$country = '';
$selectedCheckboxes = [];
        // Check if the from is submitted
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
            $gender = isset($_POST['gender']) ? htmlspecialchars($_POST['gender']) : '';
            $subscribe = isset($_POST['subscribe']) ? 'Yes' : 'No';
            $datepicker = isset($_POST['datepicker']) ? htmlspecialchars($_POST['datepicker']) : '';
            $timepicker = isset($_POST['timepicker']) ? htmlspecialchars($_POST['timepicker']) : '';
            $options = isset($_POST['options'])  ? $_POST['options'] : [];
            $country = isset($_POST['country']) ? htmlspecialchars($_POST['country']) : '';
            $selectedCheckboxes =isset($_POST['multicheckbox']) ? $_POST['multicheckbox'] : [];
        
echo '<div class="mb-6">';
echo '<ul>';
echo '<li><strong>Name:</strong> ' .$name .'</li>';
echo '<li><strong>Gender:</strong> ' .$gender .'</li>';
echo "<p>Subscribe: " . htmlspecialchars($subscribe) . "</p>";
// echo '<li><strong>Subscribe:</strong> ' .$subscribe .'</li>';
echo '<li><strong>Datepicker:</strong> ' .$datepicker .'</li>';
echo '<li><strong>Timepicker:</strong> ' .$timepicker .'</li>';
echo '<li><strong>Options:</strong> ' .implode(',', $options) .'</li>';
echo '<li><strong>Country:</strong> ' .$country .'</li>';
echo '<li><strong>Multi:</strong> ' .implode(',', $selectedCheckboxes) . '</li>';

echo '</ul>';
echo '</div>';

        }
        ?>
<form action="#" method="POST">

    <!--- Text Input --->
    <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-grey-600">Name</label>
        <input type="text" id="name" name="name" value="<?= $name ?>" class="mt-1 p-2 w-full border rounded-md">
    </div>
    
    <!--- Radio Buttons --->

    <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-600">Gender</label>
        <div class="mt-1 space-x-4">
            <label class="inline-flex items-center">
                <input type="radio" name="gender" value="male" class="form-radio text-indigo-600" <?= $gender ==='male' ? 'checked' : '' ?> >
                <span class="ml-2">Male</span>
            </label>
            <label class="inline-flex items-center">
                <input type="radio" name="gender" value="female" class="form-radio text-indigo-600" <?= $gender ==='female' ? 'checked' : '' ?> >
                <span class="ml-2">Female</span>
            </label>
        </div>
    </div>
<!--- Checkbox --->
<div class="mb-4">
    <label for="subscribe" class="block text-sm font-medium text-gray-600">Subscribe</label>
    <input type="checkbox" id="subscribe" name="subscribe" class="form-checkbox text-indigo-600" value= <?php echo $subscribe === 'Yes' ? 'checked' : '';?>>
</div>



      <!-- Multi-checkbox -->
      <div class="mb-4">
            <label class="block text-sm font-medium text-gray-600">Select Multiple Options</label>
            <div class="space-y-2">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="multicheckbox[]" value="checkbox1" class="form-checkbox text-indigo-600" <?= in_array('checkbox1', $selectedCheckboxes) ? 'checked' : '' ?> >
                    <span class="ml-2">Checkbox 1</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="checkbox" name="multicheckbox[]" value="checkbox2" class="form-checkbox text-indigo-600"  <?= in_array('checkbox2', $selectedCheckboxes) ? 'checked' : '' ?> >
                    <span class="ml-2">Checkbox 2</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="checkbox" name="multicheckbox[]" value="checkbox3" class="form-checkbox text-indigo-600"  <?= in_array('checkbox3', $selectedCheckboxes) ? 'checked' : '' ?> >
                    <span class="ml-2">Checkbox 3</span>
                </label>
            </div>
        </div>


<!--- Date Picker --->
<div class="mb-4">
    <label for="datepicker" class="block text-sm font-medium text-gray-600"  >Pick a Date</label>
    <input type="text" id="datepicker" name="datepicker" class="mt-2 p-2 w-full border" value="<?= $datepicker ?>" >
</div>

<!--- Time Picker --->
<div class="mb-4">
    <label for="timepicker" class="block text-sm font-medium text-gray-600">Pick a Time</label>
    <input type="text" id="timepicker" name="timepicker" class="mt-2 p-2 w-full border" value="<?= $timepicker ?>" >
</div>
<!--- Multiple Selector --->
<div class="mb-4">
    <label for="options" class="block text-sm font-medium text-gray-600">Select Options</label>
    <select id="options" name="options[]" class="mt-1 p-2 w-full border rounded-md" multiple>

        <option value="option1"<?= in_array('option1', $options) ? 'selected' : '' ?>>Option 2</option>
        <option value="option2"<?= in_array('option2', $options) ? 'selected' : '' ?>>Option 3</option>
        <option value="option3"<?= in_array('option3', $options) ? 'selected' : '' ?>>Option 4</option>
        <option value="option4"<?= in_array('option4', $options) ? 'selected' : '' ?>>Option 5</option>
        <option value="option5"<?= in_array('option5', $options) ? 'selected' : '' ?>>Option 6</option>
    </select>
</div>

<!-- Single Select Dropdown -->

<div class="mb-4">
    <label for="country" class="block text-sm font-medium text-gray-600">Country</label>
    <select id="country" name="country" class="mt-1 p-2 w-full border rounded-md">
        <option value="usa" <?php echo $country === 'usa' ? 'selected' : '';?>>United State</option>
        <option value="canada"<?php echo $country === 'canada' ? 'selected' : '';?>>Canada</option>
        <option value="japan"<?php echo $country === 'japan' ? 'selected' : '';?>>Japan</option>
    </select>
</div>

<!-- Submit Button -->
<div class="mt-6">
    <button type="submit" class="bg-indigo-600 text-white p-2 rounded-md">submit</button>
</div>

</form>


    </div>

    <script>


$(document).ready(function() {
    $('#options').select2();

})
        flatpickr("#datepicker", {
            dateFormat: "d-m-y"
        });

        flatpickr("#timepicker", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
        });
    </script>
    
</body>
</html>

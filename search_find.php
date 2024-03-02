<?php
// Include your database connection file
@include 'connect.php';
?>

<button style="margin-left: 7%;" class="submit-button" id="display" onclick="toggleOptions()">Apply Filters</button>
<form method="get" action="">
    <div class="options">
        <div class="left-container">

            <select id="type" class="select-style" name="type">

               <option value="" >Space Type</option>
        <option value="Banquet">Banquet</option>
        <option value="Kiosk">Kiosk</option>
        <option value="Lifestyle Center">Lifestyle Center</option>
        <option value="Mobile Van">Mobile Van</option>
         <option value="Photo studio">Photo studio</option>
        <option value="Restaurant">Restaurant</option>
        <option value="Shopping Center">Shopping Center</option>
        <option value="Shopshare">Shopshare</option>
        <option value="Stall">Stall</option>
        <option value="Storefront">Storefront</option>
        <option value="Warehouse">Warehouse</option>
        <option value="Window Display">Window Display</option>

            </select><br />

            <select name="location" class="select-style" id="location">
    <option value="" >Location</option>
    <?php
    $cities = array(
        "Ahmedabad",
        "Bangalore",
        "Bhopal",
        "Chandigarh",
        "Chennai",
        "Cochin",
        "Coimbatore",
        "Delhi",
        "Delhi NCR",
        "Faridabad",
        "Goa",
        "Hyderabad",
        "Indore",
        "Jaipur",
        "Kolkata",
        "Mount Abu",
        "Mumbai",
        "Mysore",
        "Noida",
        "Pune",
        "Surat",
        "Vadodara"

    );

    // Loop through the cities to create options
    foreach ($cities as $city) {
        echo "<option value=\"$city\">$city</option>";
    }
    ?>
</select><br />

            <select name="duration" class="select-style" id="durationInput">
                <option value="">Duration</option>
                <option value="days">Days</option>
                <option value="weeks">Weeks</option>
                <option value="months">Months</option>
            </select><br />




            <select class="select-style" id="moreFilters" onchange="toggleAmenitiesDropdown(this)">
                <option value="" disabled selected>More Filters</option>
                <option value="amenities"> Amenities</option>
            </select>

            <div class="amenities-container">

                <div id="amenitiesDropdown">
                <input type="checkbox" class="amenity-checkbox" id="airConditioning" name="amenities[]" value="Air Conditioning">
                <label for="airConditioning" class="amenity-label">Air Conditioning</label>
                
                <input type="checkbox" class="amenity-checkbox" id="chairs" name="amenities[]" value="Chairs">
                <label for="chairs" class="amenity-label">Chairs</label>
                
                <input type="checkbox" class="amenity-checkbox" id="electricity" name="amenities[]" value="Electricity">
                <label for="electricity" class="amenity-label">Electricity</label>
                
                <input type="checkbox" class="amenity-checkbox" id="elevator" name="amenities[]" value="Elevator">
                <label for="elevator" class="amenity-label">Elevator</label>
                
                <input type="checkbox" class="amenity-checkbox" id="furniture" name="amenities[]" value="Furniture">
                <label for="furniture" class="amenity-label">Furniture</label>
                
                <input type="checkbox" class="amenity-checkbox" id="garden" name="amenities[]" value="Garden">
                <label for="garden" class="amenity-label">Garden</label>
                
                <input type="checkbox" class="amenity-checkbox" id="kitchen" name="amenities[]" value="Kitchen">
                <label for="kitchen" class="amenity-label">Kitchen</label>
                
                <input type="checkbox" class="amenity-checkbox" id="multipleRooms" name="amenities[]" value="CCTV">
                <label for="multipleRooms" class="amenity-label">CCTV</label>
                
                <input type="checkbox" class="amenity-checkbox" id="parking" name="amenities[]" value="Parking">
                <label for="parking" class="amenity-label">Parking</label>
                
                <input type="checkbox" class="amenity-checkbox" id="bathrooms" name="amenities[]" value="RestRooms">
                <label for="bathrooms" class="amenity-label">RestRooms</label>
                
                <input type="checkbox" class="amenity-checkbox" id="securitySystem" name="amenities[]" value="Security System">
                <label for="securitySystem" class="amenity-label">Security System</label>
                
                <input type="checkbox" class="amenity-checkbox" id="soundproof" name="amenities[]" value="Soundproof">
                <label for="soundproof" class="amenity-label">Soundproof</label>
                
                <input type="checkbox" class="amenity-checkbox" id="terrace" name="amenities[]" value="Terrace">
                <label for="terrace" class="amenity-label">Terrace</label>
                <input type="checkbox" class="amenity-checkbox" id="Table" name="amenities[]" value="Table">
                <label for="Table" class="amenity-label">Table</label>
                
                <input type="checkbox" class="amenity-checkbox" id="waterAccess" name="amenities[]" value="Water Access">
                <label for="waterAccess" class="amenity-label">Water Access</label>

                
                </div>
            </div>


            <button type="submit" class="submit-button1">Search</button><br />
        </div>
</form>
<form method="get" action="" class='right-container'>

    <select class="select-style" name="sort_by" id="sort_by">
        <!-- Add your sorting options dynamically or use a predefined list -->
        <option value="space_area_desc">Space Area (Largest to Smallest)</option>
        <option value="space_area_asc">Space Area (Smallest to Largest)</option>
        <option value="recently_listed">Recently Listed</option>
    </select><br />
    <button class="submit-button1" type="submit" name="sort_submit">Apply Sort</button>
</form>
</div>
<script>
    function toggleOptions() {
        var optionsDiv = document.querySelector('.options');
        optionsDiv.style.display = optionsDiv.style.display === 'block' ? 'none' : 'block';
    }

    function toggleAmenitiesDropdown(selectElement) {
        var amenitiesDropdown = document.getElementById('amenitiesDropdown');
        amenitiesDropdown.style.display = selectElement.value === 'amenities' ? 'block' : 'none';
    }
</script>
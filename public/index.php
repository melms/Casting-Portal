<?php include "../inc/header.php";

$page_id = $MYACCOUNT['mode'] ? $MYACCOUNT['d_id'] : $MYACCOUNT['a_id'];

$asset_profile = "/resources/images/placeholder.png";
$asset_videos = array();
$asset_photos = array();
$assets = $db->query("SELECT url, title, type FROM assets WHERE page_id='$page_id' ORDER BY added ASC");
foreach ($assets->fetchAll() as $asset) {
  if ($asset['type'] == 1) $asset_profile = "/resources/assets/profile/".$asset['url'];
  else if ($asset['type'] == 2) array_push($asset_photos, $asset);
  else if ($asset['type'] == 3 || $asset['type'] == 4) array_push($asset_videos, $asset);
}
?>

<!-- POPUPS -->

<div id="popup_basic" class='card popup'>
  <form class='popup_form' onsubmit='updateInfo(this); return false'>
    <input type="hidden" name="func" value="updateInfo">
    <h1>Update Your Information</h1>
    <label>
      <p>Firstname</p>
      <input type='text' id="input_firstname" name='firstname' spellcheck='false' autocomplete='off' maxlength='20'>
    </label>
    <label>
      <p>Lastname</p>
      <input type='text' id="input_lastname" name='lastname' spellcheck='false' autocomplete='off' maxlength='20'>
    </label>
    <label>
      <p>Date of Birth</p>
      <input type='text' name='birthdate' spellcheck='false' autocomplete='off' maxlength='19' placeholder='mm/dd/YYYY' value="<?php $birthdate = new DateTime($MYACCOUNT['birthdate']); echo $birthdate->format('m/d/Y'); ?>" onkeyup="checkDate(event, this)">
    </label>
    <input type='submit' value='Update Information'>
  </form>
</div>
<div id="popup_notifications" class='card popup'>
  <form class='popup_form'>
    <h1>Edit Notification Settings</h1>
    <label>
      <p>Actor Follows You</p>
      <select name="gender">
        <option value="1">In Site</option>
        <option value="2">Email</option>
        <option value="3">In Site + Email</option>
      </select>
    </label>
    <label>
      <p>Actor is Interested</p>
      <select name="gender">
        <option value="1">In Site</option>
        <option value="2">Email</option>
        <option value="3">In Site + Email</option>
      </select>
    </label>
    <label>
      <p>Actor Writes You Recommendation</p>
      <select name="gender">
        <option value="1">In Site</option>
        <option value="2">Email</option>
        <option value="3" selected>In Site + Email</option>
      </select>
    </label>
    <br>
    <input type='submit' value='Update Settings'>
  </form>
</div>
<div id="popup_call" class='card popup'>
  <form class='popup_form'>
    <h1>Create Call</h1>
    <label>
      <p>Title</p>
      <input type='text' name='title' spellcheck='false' autocomplete='off' maxlength='100' placeholder="Guardians of the Galaxy"><br>
    </label>
    <label>
      <p>Type</p>
      <select name="type">
        <option value="1">Undergraduate Visual Storytelling (FTV 130)</option>
        <option value="2">Undergraduate Directing 2 (FP 338)</option>
        <option value="3">Undergraduate Directing 3 (FP 438)</option>
        <option value="4">Undergraduate Intermediate Production (FP 280)</option>
        <option value="5">Undergraduate Advanced Production (FP 331)</option>
        <option value="6">Undergraduate Senior Thesis (FP 497-498)</option>
        <option value="7">Undergraduate Byte-sized Television (TWP 313)</option>
        <option value="8">Undergraduate Television Pilots (TWP 398)</option>
        <option value="9">Undergraduate Digital Arts Project</option>
        <option value="10">Undergraduate Independent Study</option>
        <option value="11">Graduate Fundamentals of Directing 1 (FP 538)</option>
        <option value="12">Graduate Fundamentals of Directing 2 (FP 539)</option>
        <option value="13">Graduate Intermediate Directing (FP 664)</option>
        <option value="14">Graduate Advanced Directing (FP 665)</option>
        <option value="15">Graduate Master Class in Directing (FP 638)</option>
        <option value="16">Graduate Production Workshop 1 (FP 531)</option>
        <option value="17">Graduate Production Workshop 2 (FP 532)</option>
        <option value="18">Graduate Production Workshop 3 (FP 577)</option>
        <option value="19">Graduate Production Workshop 4 (FP 631)</option>
        <option value="20">Graduate Thesis (FP 698)</option>
        <option value="21">Graduate Filmmakers and Actors Workshop (FP 507)</option>
        <option value="22">Graduate Independent Study</option>
        <option value="23">Other</option>
      </select>
    </label>
    <div class='row'>
      <label>
        <p>Audition Time</p>
        <input type='text' name='audition_time' spellcheck='false' autocomplete='off' maxlength='19' placeholder='mm/dd/YYYY hh:mm am/pm' onkeyup="checkDateTime(event, this)">
      </label>
      <label>
        <p>Place</p>
        <input type='text' name='audition_time' spellcheck='false' autocomplete='off' maxlength='19' placeholder="Dodge Rm 100">
      </label>
      <div class='label_add'>+</div>
    </div>
    <div class='row'>
      <label>
        <p>Shooting Dates From</p>
        <input type='text' name='audition_time' spellcheck='false' autocomplete='off' maxlength='19' placeholder='mm/dd/YYYY' onkeyup="checkDate(event, this)">
      </label>
      <label>
        <p>To</p>
        <input type='text' name='audition_time' spellcheck='false' autocomplete='off' maxlength='19' placeholder='mm/dd/YYYY' onkeyup="checkDate(event, this)">
      </label>
      <div class='label_add'>+</div>
    </div>
    <label>
      <p>Storyline</p>
      <textarea rows='3' spellcheck='false' autocomplete='off' maxlength='1000' placeholder="Brash space adventurer Peter Quill (Chris Pratt) finds himself the quarry of relentless bounty hunters after he steals an orb coveted by Ronan, a powerful villain."></textarea>
    </label>
    <h2>CHARACTERS</h2><hr>
    <div class='row'>
      <label style="width:161px">
        <p>Name</p>
        <input type='text' name='audition_time' spellcheck='false' autocomplete='off' maxlength='19' placeholder='Peter Quill' onkeyup="checkDate(event, this)">
      </label>
      <label style="width:88px">
        <p>Min Age</p>
        <input type='text' name='audition_time' spellcheck='false' autocomplete='off' maxlength='19' placeholder='24' onkeyup="checkDate(event, this)">
      </label>
      <label style="width:88px">
        <p>Max Age</p>
        <input type='text' name='audition_time' spellcheck='false' autocomplete='off' maxlength='19' placeholder='35' onkeyup="checkDate(event, this)">
      </label>
      <label style="width:161px">
        <p>Gender</p>
        <select name="gender">
          <option value="1">Either</option>
          <option value="2">Male</option>
          <option value="3">Female</option>
        </select>
      </label>
      <div class='label_add'>+</div>
    </div>
    <textarea rows='2' spellcheck='false' autocomplete='off' maxlength='1000' placeholder="Any more additional information pertaining to this actor or character?"></textarea>
    <input type='submit' value='Create Casting Call'><input type='button' value='Upload Script'>
  </form>
</div>
<div id="popup_bio" class='card popup'>
  <form class='popup_form' onsubmit='updateBio(this); return false'>
    <input type="hidden" name="func" value="updateBio">
    <h1>Your Bio</h1>
    <textarea id="input_bio" rows='5' spellcheck='false' autocomplete='off' maxlength='1000' name="bio" placeholder="Profile pictures speak 1,000 words but your's speaks 'cutey pie' so why not fill in the rest."></textarea>
    <input type='submit' value='Update Bio'>
  </form>
</div>
<div id="popup_videos" class='card popup'>
  <form class='popup_form'>
    <h1>Add a Video</h1>
    <label>
      <p>Title</p>
      <input type='text' name='audition_time' spellcheck='false' autocomplete='off' maxlength='40' placeholder="My Demo Reel">
    </label>
    <div class='row'>
      <label>
        <p>Youtube Link ...</p>
        <input type='text' name='audition_time' spellcheck='false' autocomplete='off' maxlength='40' placeholder="https://www.youtube.com/watch?v=5mF0le5Y96M">
      </label>
      <label>
        <p>or Vimeo Link</p>
        <input type='text' name='audition_time' spellcheck='false' autocomplete='off' maxlength='40' placeholder="https://vimeo.com/67790369">
      </label>
    </div>
    <input type='submit' value='Add Video'>
  </form>
</div>

<!-- PROFILE HEADER -->

<div id='profile'>
  <input type='file' id="profile_pic_file" onchange="profilePic(this)" style="display:none" accept="image/x-png,image/jpeg">
  <div class='c_pic' id='profile_pic' onclick="document.getElementById('profile_pic_file').click()" style="background-image: url('<?php echo $asset_profile; ?>')"></div>
  <div class='card'>
    <h1 id="name"><?php echo $MYACCOUNT['firstname']." ".$MYACCOUNT['lastname'] ?></h1>
    <p><b><?php echo $MYACCOUNT['mode'] ? "Director" : "Talent" ?> · <?php echo ($MYACCOUNT["gender"] == 1) ? "Male" : "Female"; ?> · Age <?php echo date_diff(date_create($MYACCOUNT['birthdate']), date_create('now'))->y ?></b></p>
  </div>
  <div class='c_buttons'>
    <input type='button' value='Toggle to <?php echo $MYACCOUNT['mode'] ? "Talent" : "Director" ?> Mode' onclick="window.location.pathname='/toggle/'"><br>
    <input type='button' value='Update Basic Info' onclick="togglePopup(document.getElementById('popup_basic'))"><br>
    <input type='button' value='Edit Notifications' onclick="togglePopup(document.getElementById('popup_notifications'))">
  </div>
</div>

<!-- PROFILE CARDS -->

<div class='card'>
  <h1>Calls</h1>
  <p>You have no casting calls. <a href='#' onclick="togglePopup(document.getElementById('popup_call'))">Create Call?</a></p>
</div>

<div class='card_column_left'>
  <div class='card'>
    <input type='button' class='card_edit' value="edit" onclick="togglePopup(document.getElementById('popup_bio'))">
    <h1>Bio</h1>
    <p id="bio"></p>
  </div>
  <div class='card'>
    <h1>Followers</h1>
    <p>You have no followers.</p>
  </div>
</div>

<div class='card_column_right'>
  <div class='card'>
    <input type='file' id="add_photo_file" onchange="profilePic(this)" style="display:none" accept="image/x-png,image/jpeg">
    <input type='button' style='font-size: 19px' class='card_edit' value="+" onclick="document.getElementById('add_photo_file').click()">
    <h1>Photos</h1>
    <p>You have no photos. <a href='#' onclick="document.getElementById('add_photo_file').click()">Add a Photo?</a></p>
  </div>
  <div class='card'>
    <input type='button' style='font-size: 19px' class='card_edit' value="+" onclick="togglePopup(document.getElementById('popup_videos'))">
    <h1>Videos</h1>
    <p>You have no videos. <a href='#' onclick="togglePopup(document.getElementById('popup_videos'))">Add a Video?</a></p>
  </div>
  <div class='card'>
    <input type='button' class='card_edit' value="edit" onclick="togglePopup(document.getElementById('popup_recommendations'))">
    <h1>Recommendations</h1>
    <p>You have no recommendations. <a href='#' onclick="togglePopup(document.getElementById('popup_recommendations'))">Request a Recommendation?</a></p>
  </div>
</div>

<!-- SCRIPTS -->

<script>
  var firstname = "<?php echo $MYACCOUNT['firstname'] ?>"
  var lastname = "<?php echo $MYACCOUNT['lastname'] ?>"
  var bio = "<?php echo $MYACCOUNT['mode'] ? $MYACCOUNT['d_bio'] : $MYACCOUNT['a_bio'] ?>"

  refreshData()
  function refreshData() {
    document.getElementById("name").innerHTML = firstname + " " + lastname
    document.getElementById("input_firstname").value = firstname
    document.getElementById("input_lastname").value = lastname

    document.getElementById("bio").innerHTML = bio != "" ? bio : "You have no bio. <a href='#' onclick=\"togglePopup(document.getElementById('popup_bio'))\">Add a Bio?</a>"
    document.getElementById("input_bio").value = bio != "" ? bio : ""
  }

  function profilePic(input) {
    if (input.files[0].size <= 500000) {
      post("/resources/ajax/functions.php", {"func": "profilePic", "image": input.files[0]}, function(r) {
        console.log(r)
        r = JSON.parse(r)
        if (r['status'] == 'ok') document.getElementById("profile_pic").style.backgroundImage = "url('/resources/assets/profile/"+r['filename']+"?t="+Math.random()+"')"
        addAlert(r['message'])
      })
    } else addAlert("That file is larger than 500kb")
  }

  function updateBio(form) {
    form = parse(form)
    post("/resources/ajax/functions.php", form, function(r) {
      r = JSON.parse(r)
      if (r["status"] == "ok") {
        bio = form["bio"]
        refreshData()
        togglePopup()
      } else addAlert(r['message'])
    })
  }

  function updateInfo(form) {
    form = parse(form)
    post("/resources/ajax/functions.php", form, function(r) {
      r = JSON.parse(r)
      if (r["status"] == "ok") {
        firstname = form["firstname"]
        lastname = form["lastname"]
        refreshData()
        togglePopup()
      } else addAlert(r['message'])
    })
  }
</script>

<?php include "../inc/footer.php" ?>

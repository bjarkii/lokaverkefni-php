<style>
/* support Firefox, WebKit, Opera and IE8+ */

div, header, article, aside, content {
  -moz-box-sizing: border-box;
       box-sizing: border-box;
}

/* -------------- */
/* Elements */
/* -------------- */

/* fonts */
h1 {
  font-family: 'Open Sans', sans-serif;
}

h2 {
  font-family: 'Open Sans', sans-serif;
}

h3 {
  font-family: 'Open Sans', sans-serif;
}

h5 {
  font-family: 'Open Sans', sans-serif;
}

p {
  font-family: 'Open Sans', sans-serif;
}

a {
  font-family: 'Open Sans', sans-serif;
  text-decoration: none;
  color: #0b5270;
}

button {
  font-family: 'Open Sans', sans-serif;
  font-weight: 500;
}


/* page-title */
.page-title {
  margin-top: 60px;
  text-align: left;
  padding-left: 40px;
}

.page-title h3 {
  font-weight: 700;
  margin-bottom: 0px;
}

.page-title p {
  margin-top: 5px;
}

.page-title-wrap {
  border-bottom: 10px;
  margin-bottom: 10px;
  box-shadow: 0px 0px 2px #ccc;
  background: white;
  border-bottom: 5px solid #e21742;
}

/* lists */
ul {
  padding: 0px;
  margin: 0px;
}

/* box styling */
.box-wrap {
  background: white;
  border-bottom: #ccc 1px solid;
  box-shadow: 0px 0px 2px #ccc;
}

.box-content {
  padding: 10px;
}

/* input field */
.input-field input {
  width: 100%;
  border: none;
  border-radius: 5px;
  border: 1px solid #ccc;
  padding: 10px;
  font-size: 15px;
}

/* buttons */
.btn-color {
  background: #e21742;
  border-radius: 5px;
  border: none;
  color: white;
  padding: 10px;
  display: inline-block;
  margin-top: 20px;
}

.post-btn {
  background: #e21742;
  color: white;
  display: inline-block;
  margin: 0px;
  padding: 9px;
  border-radius: 5px;
  font-weight: 500;
  border: 1px solid #e21742;;
  cursor: pointer;

  transition: all 0.3s;
}

.post-btn:hover {
  background: white;
  color: #e21742;
  text-decoration: none;
}

#post-btn-icon {
  width: 5px;
}

.delete-btn {
  background: none;
  border: none;
  text-transform: uppercase;
  color: #b1b1b1;
  display: inline-block;
  text-align: left;
  font-size: 12px;

  transition: all 0.3s;
}

.delete-btn:hover {
  background: #ccc;
  color: white;
}

.delete-btn span {
  font-weight: 700;
}

/* -------------- */
/* LAYOUTS */
/* -------------- */

/* header */
header {
  background: white;
  position: fixed;
  width: 100%;

  box-shadow: 0px 0px 2px #CCC;
}

.header-links {
  text-align: center;
  padding-top: 15px
}

.header-links ul li {
  display: inline;
}

.header-links li {
}

.header-links form {
  display: inline-block;
}

.header-links button {
  background: none;
  border: none;
  display: inline;
  font-weight: 500;
  color: #131313;
  padding: 0px;
  font-size: 15px;
}

.header-links a {
  color: #131313;
  font-size: 15px;
  padding-right: 10px;
  padding-left: 10px;
  padding-bottom: 16px;
}

.header-links a:hover {
  text-decoration: none;
  border-bottom: 5px solid #E21742;
}

.header-user {
  text-align: center;
  height: 100%;
}

.header-user ul li {
  display: inline;
}

.header-user li {
  height: 100%;
}

.header-user-pic {
  width: 50px;
  height: 40px;
  overflow: hidden;
  display: inline-block;
}

.header-user img {
  width: 100%;
  min-width: 100%;
  min-height: 100%;
}

.header-user-btn {
  display: inline-block;
  height: 50px;
  overflow: hidden;
  padding-top: 10px;
}

.nano-bar .bar {
  background: #e21742;
}


/* page content */
body {
  background: #e5e5e5;
}

.page-content {
  width: 70%;
  margin: auto;
}

/* home */
.user-info {
  text-align: center;
}

.user-info img {
  width: 50%;
}

.all-users-wrap {
  padding: 20px;
  padding-top: 0px;
}

.user-info-pic img {
  width: 100%;
}

.user-info-username {
  text-align: center;
  padding-top: 20px;
  padding-bottom: 10px;
  background: white;
  margin-bottom: 10px;
}

/* profile */

.box-banner {
  height: 300px;
  background-attachment: fixed;
}

.box-banner img {
    min-width: 100%;
    min-height: 100%;
}

.profile-pic {
  overflow: hidden;
  border-radius: 10px;
  margin-top: -40px;
  border: 4px solid white;
  height: 250px;
}

.profile-content {
  padding-top: 20px;
  padding-left: 40px;
}

.profile-content .btn-color {
  margin-top: 5px;
}

.profile-content h2 {
  margin-top: 0px;
}

.profile-content p {
  font-size: 12px;
  color: #b1b1b1;
}

.profile-pic img {
  min-width: 100%;
  min-height: 100%;
}

.profile-header {
  margin-bottom: 20px;
}

/* my profile */

.profile-edit-input {
  padding: 10px;
}

.profile-edit-input input {
  padding: 10px;
  width: 100%;
}

.profile-edit-input label {
  margin-top: 10px;
}

.update-profile-btns {
  text-align: center;
  padding: 20px;
  padding-top: 5px;
  border-top: 1px solid #ccc;
}

/* all users */

.user-box-content {
  padding: 20px;
  text-align: center;
}

.user-box-content h3 {
  font-weight: 700;
}

.user-box-image img {
  width: 100%;
}

.user-box-excerpt ul li {
  display: inline-block;
}

.user-box-excerpt li {
  padding-right: 10px;
}

/* post feed */

.post-wrap {
  padding: 40px;
  padding-top: 20px;
}

.post-image {
  overflow: hidden;
  display: inline-block;
  width: 70px;
  height: 70px;
  border-radius: 5px;
}

.post-content{
  text-align: left;
  display: inline-block;
}

.post-image img {
  display: inline;
  width: 100%;
  min-width: 100%;
  min-height: 100%;
}

.post-content h3 {
  font-weight: 300;
  font-size: 25px;
  margin-bottom: 5px;
  margin-top: 0px;
  padding-left: 20px;
}

.post-excerpt {
  text-align: left;
  padding-left: 0px;
}

.post-excerpt ul li {
  display: inline-block;
}

.post-excerpt li {
  margin-right: 10px;
}

.like img {
  width: 15px;
}

.like button {
  border: none;
  background: none;
  padding: 0px;
}

.like-btn p {
  display: inline-block;
  margin-left: 5px;
}

.post-user-actions {
  border-bottom: 1px solid #ccc;
  display: none;

  transition: all 0.3s;
}

.box-wrap:hover {
  background: #f2f2f2;
}

.box-wrap:hover .post-user-actions {
  display: block;
}

.no-posts {
  text-align: center;
}

.no-posts h3 {
  color: #B1B1B1;
  font-size: 25px;
}

.post-attachment img {
  width: 100%;
}

.reply-button img {
  width: 20px;
}

/* Login */
.login-box {
  padding: 40px;
}



</style>

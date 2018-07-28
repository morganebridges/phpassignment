# phpassignment
Homework for BDPA HSCC

Homework for the week of 7/22 - 

User Profiles:

1. When a user is registered, we should insert a "user profile" for this user. Information for this profile can be collected by expanding on the user registration submission form. 

2. Create a new directory called "media" under which each user (specified by user id) will have a folder. This folder will have an "images"
subfolder which will contain their profile picture along with others. When a profile picture is added, we should add the filename to the user profile'.

3. Once the user is logged in, redirect them to their own profile page. This page needs to query the user profile table and display the 
data there in an aesthetically pleasing way.

4. EDIT User profile. Give another form (can be very similar to the registration form) that allows for UPDATEs to the user profile.
Add a query to the queryBuilder file that will use the UPDATE query type to persist this information.

5. Add another table called "posts". Posts need to have a foreign key relationship to user profiles (i.e. the POST table has a "userProfileFk" integer field
that tells us which user profile the post is associated with.

6. When a user views their profile, display all posts.

7. Create a form the user can submit posts through (this is very similar to the registration page, just goes into a different table).
NOTE - Make sure to check which user isf logged in through the session variable when submitting posts, becausfe we will need to know 
which user profile the post is associated with

Extra Credit:
Figure out how to POST an image via a form, copy it into the user's media/images directory, and display it when the user logs in.

Automatically create the user's media directory when they sign up.

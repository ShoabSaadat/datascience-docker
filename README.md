# dockerdrive
Full Data Science Docker Setup: Rstudio server, Shiny server, Plumber API, LEMP stack

---ONE STEP INSTALL
1. Run bash setupdocker from root directory

---FASTEST INSTALL
1. Just install dropbox first
2. Go to /home/ubuntu/Dropbox/DockerDrive/envsetup and RUN bash setup-env (or just RUN bash setupdocker)
3. Then in ./DockerDrive RUN bash rundocker

---INSTALL AWAY (Independent of Dropbox Install)
1. Install dropbox and add to /home/ubuntu/Dropbox (can use env-setup)
2. Install docker, docker-compose and zip (can use env-setup)
3. Run bash setupdocker

----TROUBLE SHOOTING:
1. If wp doesnt accept a new db and says already exists and doesnt exist, this means information_schema in phpmyadmin has data about that db and you manually deleted the files instead of using phpmyadmin. So, create a db of similar name and then delete it so it makes way for new db.

2. Sometimes above error occurs if chmod permission is not given for the new database folder created using phpmyadmin in mysql folder, so give it permissions and then install the wordpress site

3. Use following code at end of wp-config to enable updating of themes and plugings without using an ftp server.
   define('FS_METHOD','direct');

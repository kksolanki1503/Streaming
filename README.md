# Streaming
This repo contain streaming website and all related file

If you want to upload any anime then you can open admin.php where your can upload anime.
  the data of the anime will be stored in the database and retrieve in the user.php through database.


to use this webiste you have to follow these steps--->
1) install mysql
2) install xampp
3) start starting 2 servies in xampp
4) in workbench crete anime_db database and create 2 table . first one is user(name,email,pass,dt) and second one is anime(nam,src)
5) execute command "GRANT ALL PRIVILEGES ON *.* TO 'root'@'localhost' IDENTIFIED BY 'your_password' WITH GRANT OPTION;
FLUSH PRIVILEGES;"
6) now copy this website folder and past in c/xampp/ht../dashboard/
7) delete index.html of the default file exist inside dashboard
8) open control pannel in xampp and click on adnim.
9) it will start localhost on browser and now you can add anime and use the website.

    thankyou

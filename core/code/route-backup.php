<?PHP 
@session_start();

    if (! isset($_GET['page']))
    {
        $halaman="./dash.php";
    }
    else
    {   
        switch($_GET["page"])
        {               

            case "about":
                $halaman="./about.php";
            break; 

            case "contact":
                $halaman="./contact.php";               
            break; 

            case "exhibitor":
                $halaman="./exhibitor.php";               
            break; 

            case "exhibitor-thankyou":
                $halaman="./exhibitor-thankyou.php";               
            break; 

            case "gallery":
                $halaman="./gallery.php"; 
            break;

            case "internship":
                $halaman="./internship.php"; 
            break; 

            case "tips":
                $halaman="./tips.php"; 
            break;  

            case "upcoming-event":
                $halaman="./upcoming-event.php"; 
            break;

            case "3product":
                $halaman="./article/3product.php"; 
            break; 

            case "pakaianpria":
                $halaman="./article/pakaianpria.php"; 
            break; 

            case "nasibcloth":
                $halaman="./article/nasibcloth.php"; 
            break; 
        }
    }

    include("$halaman");
?>
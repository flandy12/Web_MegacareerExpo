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
        
            case "ds":
                $halaman="./dash.php";               
            break; 

            case "about":
                $halaman="./about.php";               
            break; 

            case "contact":
                $halaman="./contact.php";               
            break;

            case "design":
                $halaman="./design.php";               
            break; 

            case "project":
                $halaman="./project.php";               
            break;

            case "portfolio":
                $halaman="./portfolio.php";
            break;

            case "rental":
                $halaman="./rental.php";
            break;

            case "response":
                $halaman="./contact_response.php";
            break;

        }
    }

    include("$halaman");
?>
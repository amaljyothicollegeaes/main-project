
        <?php
        session_start();
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpassword = "";
        $dbname = "ewed";
        $con = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
        if (isset($_SESSION['id'])) {

            $id = $_SESSION['id'];
            $ORDER_ID = $_POST['ORDER_ID'];
            $CUST_ID = $_POST['CUST_ID'];
            $month = $_POST['INDUSTRY_TYPE_ID'];
            $amount = $month * 100;

            $fetch_bill = "SELECT * FROM login where id = $id";
            $fetch_bill_result = mysqli_query($con, $fetch_bill);
            $data_fetch_bill_result = mysqli_fetch_assoc($fetch_bill_result);

            $Name = $data_fetch_bill_result['fname']." ".$data_fetch_bill_result['lname'];


            include('pdf_mc_table.php');
            $pdf = new PDF_MC_TABLE();
            $pdf->AddPage();
            $pdf->SetFont('Arial', 'B', 15);
            $pdf->Cell(176, 5, 'E Wed Bill', 0, 0, 'C');


            $pdf->Ln();
            $pdf->Ln();
            $pdf->Ln();
            $pdf->SetFont('Arial', '', 12);


            $pdf->Multicell(0, 12, 'ORDER ID : ' . $ORDER_ID, 1, 'C');
            $pdf->Multicell(0, 12, 'Bank Name : ' . $CUST_ID, 1, 'C');
            $pdf->Multicell(0, 12, 'User Name : ' . $Name, 1, 'C');
            $pdf->Multicell(0, 12, 'Total Months : ' . $month, 1, 'C');
            $pdf->Multicell(0, 12, 'Total Amount : ' . $amount, 1, 'C');



            $pdf->Output();
        }
        ?>
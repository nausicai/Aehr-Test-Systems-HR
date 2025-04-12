<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Invoice PDFs</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        /* Dark background overlay */
#previewOverlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5); /* Dark background */
    z-index: 1000;
}

/* Centered Preview */
#previewContainer {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 50%;
    height: 80%;
    background: white;
    border-radius: 5px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
    z-index: 1001;
    padding: 10px;
}

#pdfPreview {
    width: 100%;
    height: 90%;
}

.closePreview {
    cursor: pointer;
    color: red;
    font-weight: bold;
    float: right;
    font-size: 18px;
}

    </style>
</head>
<body>
    <h2>Upload Invoice PDFs</h2>
    
    <input type="file" name="pdf_files[]" id="pdf_files" accept="application/pdf" multiple required>

    <h3>Selected Files</h3>
    <ul id="fileList"></ul>

    <button id="uploadButton" type="submit">Upload & Preview</button>

    <h3>Extracted Invoice Data</h3>
    <table border="1" id="invoiceTable">
        <thead>
            <tr>
                <th>Title</th>
                <th>TIN Number</th>
                <th>Account Number</th>
                <th>Date</th>
                <th>Invoice Number</th>
                <th>Payment Due</th>
                <th>Total Amount</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="7" align="center">No Data Available</td>
            </tr>
        </tbody>
    </table>

    <div id="errorMessage" style="display:none; color:red; font-weight:bold; margin-top:10px;">
        Your uploaded PDF is an image-based PDF and cannot be read.<br>
        Try converting it to a readable PDF first using OCR.<br>
        <a href="https://www.ilovepdf.com/ocr-pdf" target="_blank" style="color:blue;">Click here</a> to convert your PDF into a readable format.<br>
        Once converted, please re-upload your readable PDF.
    </div>
<br>
    <button id="exportExcel" style="display:none;">Export to Excel</button>

    <!-- Dark background overlay -->
    <div id="previewOverlay"></div>

    <!-- Floating Preview -->
    <div id="previewContainer">
        <span class="closePreview">✖</span>
        <iframe id="pdfPreview"></iframe>
    </div>


    <script>
        let selectedFiles = [];

        $("#pdf_files").on("change", function (e) {
            const files = e.target.files;

            for (let i = 0; i < files.length; i++) {
                const file = files[i];

                // Check if file is already added
                if (selectedFiles.some(f => f.name === file.name)) {
                    alert(`${file.name} is already added.`);
                    continue;
                }

                selectedFiles.push(file);
                const fileURL = URL.createObjectURL(file);

                $("#fileList").append(`
                    <li data-name="${file.name}">${file.name} 
                        <button class="previewFile" data-url="${fileURL}">Preview</button>
                        <button class="removeFile" data-name="${file.name}">X</button>
                    </li>
                `);
            }
        });

        $(document).on("click", ".removeFile", function () {
            const fileName = $(this).data("name");

            // Remove file from selectedFiles array
            selectedFiles = selectedFiles.filter(file => file.name !== fileName);

            // Remove from UI
            $(this).parent().remove();
        });

        $(document).on("click", ".previewFile", function () {
            const fileURL = $(this).data("url");
            $("#pdfPreview").attr("src", fileURL);
            $("#previewOverlay, #previewContainer").fadeIn();
        });

        // Close when clicking the "✖" button
        $(".closePreview").on("click", function () {
            $("#previewOverlay, #previewContainer").fadeOut();
        });

        // Close when clicking outside the preview
        $("#previewOverlay").on("click", function () {
            $("#previewOverlay, #previewContainer").fadeOut();
        });


        $("#uploadButton").on("click", function (e) {
            e.preventDefault();
            if (selectedFiles.length === 0) {
                alert("There is no file.");
                return;
            }

            let formData = new FormData();
            selectedFiles.forEach(file => formData.append("pdf_files[]", file));

            $.ajax({
                url: "process_pdf.php",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    try {
                        let data = JSON.parse(response);
                        if (data.success) {
                            $("#invoiceTable tbody").empty();
                            data.invoices.forEach(invoice => {
                                $("#invoiceTable tbody").append(`
                                    <tr>
                                        <td>${invoice.title}</td>
                                        <td>${invoice.tin_number}</td>
                                        <td>${invoice.account_number}</td>
                                        <td>${invoice.date}</td>
                                        <td>${invoice.invoice_number}</td>
                                        <td>${invoice.payment_due}</td>
                                        <td>${invoice.total_amount}</td>
                                    </tr>
                                `);
                            });
                            $("#errorMessage").toggle(data.hasMissingData);
                            $("#exportExcel").toggle(!data.hasMissingData);
                        } else {
                            alert("Error: " + data.message);
                        }
                    } catch (error) {
                        alert("Error parsing response. Please try again.");
                    }
                },
                error: function () {
                    alert("Failed to upload. Please try again.");
                }
            });
        });

        $("#exportExcel").on("click", function () {
            window.location.href = "export_excel.php";
        });
    </script>
</body>
</html>

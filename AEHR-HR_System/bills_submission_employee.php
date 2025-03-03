<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bills Submission - ATS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #ff6b6b, #f57c00);
            padding: 20px;
        }

        .bills-container {
            width: 100%;
            max-width: 600px;
            background: #fff;
            padding: 35px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
            border-radius: 12px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .bills-container:hover {
            transform: scale(1.03);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.3);
        }

        .logo img {
            width: 100%;
            max-width: 300px;
            margin-bottom: 20px;
        }

        .back-btn {
            position: absolute;
            top: 20px;
            left: 20px;
            background: linear-gradient(135deg, #f57c00, #d32f2f);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .back-btn:hover {
            background: linear-gradient(135deg, #d32f2f, #f57c00);
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
        }

        .upload-section {
            margin-bottom: 30px;
        }

        .upload-label {
            display: block;
            font-size: 18px;
            font-weight: bold;
            color: #333;
            margin-bottom: 15px;
        }

        .upload-input {
            display: none;
        }

        .upload-btn {
            padding: 15px 25px;
            background: #f57c00;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.3s ease;
        }

        .upload-btn:hover {
            background: #d32f2f;
            transform: translateY(-5px);
        }

        .preview-section {
            margin-top: 20px;
        }

        .preview-label {
            font-size: 18px;
            font-weight: bold;
            color: #333;
            margin-bottom: 15px;
        }

        .preview-content {
            max-width: 100%;
            height: auto;
            border: 2px dashed #f57c00;
            border-radius: 8px;
            padding: 10px;
            background: #f9f9f9;
        }

        .file-preview {
            position: relative;
            margin-bottom: 10px;
        }

        .file-preview img, .file-preview embed, .file-preview pre {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .delete-btn {
            position: absolute;
            top: 5px;
            right: 5px;
            background: #ff6b6b;
            color: white;
            border: none;
            border-radius: 50%;
            width: 25px;
            height: 25px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            transition: background 0.3s ease;
        }

        .delete-btn:hover {
            background: #d32f2f;
        }

        .submit-btn {
            margin-top: 20px;
            padding: 15px 25px;
            background: #4CAF50;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.3s ease;
        }

        .submit-btn:hover {
            background: #45a049;
            transform: translateY(-5px);
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .modal-content {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
            text-align: center;
            animation: fadeIn 0.3s ease;
        }

        .modal-content h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        .modal-content p {
            margin-bottom: 20px;
            font-size: 18px;
            color: #555;
        }

        .modal-content button {
            padding: 10px 20px;
            margin: 0 10px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.3s ease;
        }

        .modal-content button.confirm-btn {
            background: #4CAF50;
            color: white;
        }

        .modal-content button.confirm-btn:hover {
            background: #45a049;
            transform: translateY(-5px);
        }

        .modal-content button.cancel-btn {
            background: #f57c00;
            color: white;
        }

        .modal-content button.cancel-btn:hover {
            background: #d32f2f;
            transform: translateY(-5px);
        }

        .success-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .success-modal-content {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
            text-align: center;
            animation: fadeIn 0.3s ease;
        }

        .success-modal-content h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        .success-modal-content p {
            margin-bottom: 20px;
            font-size: 18px;
            color: #555;
        }

        .success-modal-content button {
            padding: 10px 20px;
            background: #4CAF50;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.3s ease;
        }

        .success-modal-content button:hover {
            background: #45a049;
            transform: translateY(-5px);
        }

        .error-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .error-modal-content {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
            text-align: center;
            animation: fadeIn 0.3s ease;
        }

        .error-modal-content h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #d32f2f;
        }

        .error-modal-content p {
            margin-bottom: 20px;
            font-size: 18px;
            color: #555;
        }

        .error-modal-content button {
            padding: 10px 20px;
            background: #f57c00;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.3s ease;
        }

        .error-modal-content button:hover {
            background: #d32f2f;
            transform: translateY(-5px);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @media (max-width: 480px) {
            .bills-container {
                padding: 25px;
            }
            .upload-label, .preview-label {
                font-size: 16px;
            }
            .upload-btn, .submit-btn {
                font-size: 14px;
                padding: 12px 20px;
            }
        }
    </style>
</head>
<body>
    <button class="back-btn" onclick="window.location.href='employee_dashboard.php'">
        <i class="fas fa-arrow-left"></i> Back
    </button>

    <div class="bills-container">
        <div class="logo">
            <img src="img/ATS_Logo.png" alt="ATS Logo">
        </div>
        <div class="upload-section">
            <label for="file-upload" class="upload-label">Upload your bill receipts (Image, PDF, or Text File)</label>
            <input type="file" id="file-upload" class="upload-input" accept="image/*, .pdf, .txt" multiple>
            <button class="upload-btn" onclick="document.getElementById('file-upload').click()">
                <i class="fas fa-upload"></i> Choose Files
            </button>
        </div>
        <div class="preview-section">
            <div class="preview-label">Preview</div>
            <div class="preview-content" id="preview-content">
                <!-- Preview will be displayed here -->
            </div>
        </div>
        <button class="submit-btn" id="submit-btn">
            <i class="fas fa-paper-plane"></i> Submit
        </button>
    </div>

    <!-- Confirmation Modal -->
    <div class="modal" id="confirmation-modal">
        <div class="modal-content">
            <h2>Confirm Submission</h2>
            <p>Are you sure you want to submit the receipt?</p>
            <button class="confirm-btn" id="confirm-submit">Yes, Submit</button>
            <button class="cancel-btn" id="cancel-submit">Cancel</button>
        </div>
    </div>

    <!-- Success Modal -->
    <div class="success-modal" id="success-modal">
        <div class="success-modal-content">
            <h2>Success!</h2>
            <p>Your receipt has been successfully submitted.</p>
            <button id="close-success-modal">Close</button>
        </div>
    </div>

    <!-- Error Modal -->
    <div class="error-modal" id="error-modal">
        <div class="error-modal-content">
            <h2>Error!</h2>
            <p>Please upload at least one file before submitting.</p>
            <button id="close-error-modal">OK</button>
        </div>
    </div>

    <script>
        const fileUpload = document.getElementById('file-upload');
        const previewContent = document.getElementById('preview-content');
        const submitBtn = document.getElementById('submit-btn');
        const confirmationModal = document.getElementById('confirmation-modal');
        const successModal = document.getElementById('success-modal');
        const errorModal = document.getElementById('error-modal');
        const confirmSubmitBtn = document.getElementById('confirm-submit');
        const cancelSubmitBtn = document.getElementById('cancel-submit');
        const closeSuccessModalBtn = document.getElementById('close-success-modal');
        const closeErrorModalBtn = document.getElementById('close-error-modal');
        let uploadedFiles = [];

        fileUpload.addEventListener('change', function(event) {
            const files = event.target.files;
            uploadedFiles = uploadedFiles.concat(Array.from(files)); // Add new files to the existing list
            previewContent.innerHTML = ''; // Clear previous previews

            if (uploadedFiles.length > 0) {
                uploadedFiles.forEach((file, index) => {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const filePreview = document.createElement('div');
                        filePreview.className = 'file-preview';

                        if (file.type.startsWith('image/')) {
                            filePreview.innerHTML = `
                                <img src="${e.target.result}" alt="Preview" style="max-width: 100%; height: auto;">
                                <button class="delete-btn" onclick="deleteFile(${index})">&times;</button>
                            `;
                        } else if (file.type === 'application/pdf') {
                            filePreview.innerHTML = `
                                <embed src="${e.target.result}" width="100%" height="300px" type="application/pdf">
                                <button class="delete-btn" onclick="deleteFile(${index})">&times;</button>
                            `;
                        } else if (file.type === 'text/plain') {
                            filePreview.innerHTML = `
                                <pre>${e.target.result}</pre>
                                <button class="delete-btn" onclick="deleteFile(${index})">&times;</button>
                            `;
                        } else {
                            filePreview.innerHTML = `
                                <p>File type not supported for preview: ${file.name}</p>
                                <button class="delete-btn" onclick="deleteFile(${index})">&times;</button>
                            `;
                        }

                        previewContent.appendChild(filePreview);
                    };
                    reader.readAsDataURL(file);
                });
            } else {
                previewContent.innerHTML = `<p>No files selected.</p>`;
            }
        });

        function deleteFile(index) {
            uploadedFiles.splice(index, 1); // Remove the file from the array
            previewContent.innerHTML = ''; // Clear the preview content

            // Re-render the remaining files
            uploadedFiles.forEach((file, newIndex) => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const filePreview = document.createElement('div');
                    filePreview.className = 'file-preview';

                    if (file.type.startsWith('image/')) {
                        filePreview.innerHTML = `
                            <img src="${e.target.result}" alt="Preview" style="max-width: 100%; height: auto;">
                            <button class="delete-btn" onclick="deleteFile(${newIndex})">&times;</button>
                        `;
                    } else if (file.type === 'application/pdf') {
                        filePreview.innerHTML = `
                            <embed src="${e.target.result}" width="100%" height="300px" type="application/pdf">
                            <button class="delete-btn" onclick="deleteFile(${newIndex})">&times;</button>
                        `;
                    } else if (file.type === 'text/plain') {
                        filePreview.innerHTML = `
                            <pre>${e.target.result}</pre>
                            <button class="delete-btn" onclick="deleteFile(${newIndex})">&times;</button>
                        `;
                    } else {
                        filePreview.innerHTML = `
                            <p>File type not supported for preview: ${file.name}</p>
                            <button class="delete-btn" onclick="deleteFile(${newIndex})">&times;</button>
                        `;
                    }

                    previewContent.appendChild(filePreview);
                };
                reader.readAsDataURL(file);
            });
        }

        submitBtn.addEventListener('click', function() {
            if (uploadedFiles.length > 0) {
                confirmationModal.style.display = 'flex';
            } else {
                errorModal.style.display = 'flex';
            }
        });

        confirmSubmitBtn.addEventListener('click', function() {
            confirmationModal.style.display = 'none';
            // Simulate submission process
            setTimeout(() => {
                successModal.style.display = 'flex';
                uploadedFiles = []; // Clear the uploaded files after submission
                previewContent.innerHTML = ''; // Clear the preview content
            }, 500);
        });

        cancelSubmitBtn.addEventListener('click', function() {
            confirmationModal.style.display = 'none';
        });

        closeSuccessModalBtn.addEventListener('click', function() {
            successModal.style.display = 'none';
        });

        closeErrorModalBtn.addEventListener('click', function() {
            errorModal.style.display = 'none';
        });

        window.addEventListener('click', function(event) {
            if (event.target === confirmationModal) {
                confirmationModal.style.display = 'none';
            }
            if (event.target === successModal) {
                successModal.style.display = 'none';
            }
            if (event.target === errorModal) {
                errorModal.style.display = 'none';
            }
        });
    </script>
</body>
</html>
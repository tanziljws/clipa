@extends('admin.layouts.app')

@section('title', 'Tambah Galeri')

@section('content')
<div class="galeri-container">
    <div class="page-header">
        <h1 class="page-title">Tambah Galeri</h1>
        <p class="page-subtitle">Upload foto dengan mudah menggunakan drag & drop</p>
    </div>

    <form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data" id="galeriForm">
        @csrf
        
        <!-- Upload Area -->
        <div class="upload-section">
            <div class="upload-area" id="uploadArea">
                <div class="upload-content">
                    <div class="upload-icon">
                        <i class="fas fa-cloud-upload-alt"></i>
                    </div>
                    <h3>Drag & Drop Foto di sini</h3>
                    <p>atau <span class="upload-link">klik untuk memilih file</span></p>
                    <small>Mendukung JPG, PNG, GIF (Max 10MB per file)</small>
                </div>
                <input type="file" name="gambar[]" id="fileInput" multiple accept="image/*" style="display: none;">
            </div>
            
            <!-- Preview Area -->
            <div class="preview-area" id="previewArea" style="display: none;">
                <h4>Preview Foto</h4>
                <div class="preview-grid" id="previewGrid"></div>
            </div>
        </div>

        <!-- Form Fields -->
        <div class="form-section">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label class="form-label">Judul Galeri</label>
                        <input type="text" name="judul" class="form-control modern-input" placeholder="Masukkan judul galeri" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Kategori</label>
                        <select name="id_kategori" class="form-control modern-select" required>
                            <option value="">Pilih Kategori</option>
                            @foreach($kategori as $k)
                                <option value="{{ $k->id_kategori }}">{{ $k->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label class="form-label">Tanggal Upload</label>
                <input type="date" name="tanggal_upload" class="form-control modern-input" value="{{ date('Y-m-d') }}" required>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="action-section">
            <button type="submit" class="btn-primary" id="submitBtn" disabled>
                <i class="fas fa-save"></i>
                Simpan Galeri
            </button>
            <a href="{{ route('galeri.index') }}" class="btn-secondary">
                <i class="fas fa-arrow-left"></i>
                Kembali
            </a>
        </div>
    </form>
</div>

<style>
.galeri-container {
    max-width: 1000px;
    margin: 0 auto;
    font-family: 'Inter', sans-serif;
}

.page-header {
    text-align: center;
    margin-bottom: 2rem;
}

.page-title {
    font-size: 2.5rem;
    font-weight: 800;
    color: var(--dark-teal);
    margin: 0;
    background: linear-gradient(135deg, var(--dark-teal), var(--primary-color));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.page-subtitle {
    font-size: 1.1rem;
    color: #6b7280;
    margin: 0.5rem 0 0 0;
}

/* Upload Section */
.upload-section {
    margin-bottom: 2rem;
}

.upload-area {
    border: 3px dashed var(--primary-color);
    border-radius: 20px;
    padding: 3rem 2rem;
    text-align: center;
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(20px);
    transition: all 0.3s ease;
    cursor: pointer;
    position: relative;
    overflow: hidden;
}

.upload-area:hover {
    border-color: var(--secondary-color);
    background: rgba(255, 255, 255, 0.95);
    transform: translateY(-2px);
    box-shadow: 0 10px 30px rgba(15, 76, 117, 0.2);
}

.upload-area.dragover {
    border-color: var(--secondary-color);
    background: rgba(50, 130, 184, 0.12);
    transform: scale(1.02);
}

.upload-content {
    position: relative;
    z-index: 2;
}

.upload-icon {
    font-size: 3rem;
    color: var(--primary-color);
    margin-bottom: 1rem;
    animation: bounce 2s infinite;
}

@keyframes bounce {
    0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
    40% { transform: translateY(-10px); }
    60% { transform: translateY(-5px); }
}

.upload-area h3 {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--dark-teal);
    margin: 0 0 0.5rem 0;
}

.upload-area p {
    font-size: 1rem;
    color: var(--light-text);
    margin: 0 0 1rem 0;
}

.upload-link {
    color: var(--secondary-color);
    font-weight: 600;
    text-decoration: underline;
    cursor: pointer;
}

.upload-area small {
    font-size: 0.9rem;
    color: #9ca3af;
}

/* Preview Area */
.preview-area {
    margin-top: 2rem;
    padding: 2rem;
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(20px);
    border-radius: 20px;
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.preview-area h4 {
    font-size: 1.3rem;
    font-weight: 700;
    color: var(--dark-teal);
    margin: 0 0 1.5rem 0;
}

.preview-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
    gap: 1rem;
}

.preview-item {
    position: relative;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

.preview-item:hover {
    transform: scale(1.05);
}

.preview-item img {
    width: 100%;
    height: 120px;
    object-fit: cover;
}

.preview-item .remove-btn {
    position: absolute;
    top: 8px;
    right: 8px;
    background: rgba(239, 68, 68, 0.9);
    color: white;
    border: none;
    border-radius: 50%;
    width: 24px;
    height: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    font-size: 12px;
    transition: all 0.3s ease;
}

.preview-item .remove-btn:hover {
    background: #dc2626;
    transform: scale(1.1);
}

/* Form Section */
.form-section {
    margin-bottom: 2rem;
    padding: 2rem;
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(20px);
    border-radius: 20px;
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.form-group {
    margin-bottom: 1.5rem;
}

.form-label {
    display: block;
    font-weight: 600;
    color: var(--dark-teal);
    margin-bottom: 0.5rem;
    font-size: 1rem;
}

.modern-input, .modern-select {
    width: 100%;
    padding: 12px 16px;
    border: 2px solid #d6dee8;
    border-radius: 12px;
    font-size: 1rem;
    transition: all 0.3s ease;
    background: white;
}

.modern-input:focus, .modern-select:focus {
    outline: none;
    border-color: var(--primary-color);
    box-shadow: 0 0 0 3px rgba(15, 76, 117, 0.12);
}

/* Action Section */
.action-section {
    display: flex;
    gap: 1rem;
    justify-content: center;
    margin-top: 2rem;
}

.btn-primary, .btn-secondary {
    padding: 12px 24px;
    border-radius: 12px;
    font-weight: 600;
    font-size: 1rem;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
}

.btn-primary {
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    color: white;
    box-shadow: 0 4px 15px rgba(15, 76, 117, 0.25);
}

.btn-primary:hover:not(:disabled) {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(15, 76, 117, 0.35);
}

.btn-primary:disabled {
    opacity: 0.5;
    cursor: not-allowed;
}

.btn-secondary {
    background: rgba(255, 255, 255, 0.9);
    color: var(--light-text);
    border: 2px solid #d6dee8;
}

.btn-secondary:hover {
    background: white;
    border-color: var(--primary-color);
    color: var(--primary-color);
    transform: translateY(-2px);
}

/* Responsive */
@media (max-width: 768px) {
    .galeri-container {
        padding: 0 1rem;
    }
    
    .upload-area {
        padding: 2rem 1rem;
    }
    
    .preview-grid {
        grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
    }
    
    .action-section {
        flex-direction: column;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const uploadArea = document.getElementById('uploadArea');
    const fileInput = document.getElementById('fileInput');
    const previewArea = document.getElementById('previewArea');
    const previewGrid = document.getElementById('previewGrid');
    const submitBtn = document.getElementById('submitBtn');
    let selectedFiles = [];

    // Click to upload
    uploadArea.addEventListener('click', () => fileInput.click());

    // Drag and drop
    uploadArea.addEventListener('dragover', (e) => {
        e.preventDefault();
        uploadArea.classList.add('dragover');
    });

    uploadArea.addEventListener('dragleave', () => {
        uploadArea.classList.remove('dragover');
    });

    uploadArea.addEventListener('drop', (e) => {
        e.preventDefault();
        uploadArea.classList.remove('dragover');
        const files = Array.from(e.dataTransfer.files);
        handleFiles(files);
    });

    // File input change
    fileInput.addEventListener('change', (e) => {
        const files = Array.from(e.target.files);
        handleFiles(files);
    });

    function handleFiles(files) {
        const imageFiles = files.filter(file => file.type.startsWith('image/'));
        
        if (imageFiles.length === 0) {
            alert('Harap pilih file gambar yang valid!');
            return;
        }

        selectedFiles = [...selectedFiles, ...imageFiles];
        updatePreview();
        updateSubmitButton();
    }

    function updatePreview() {
        previewGrid.innerHTML = '';
        
        selectedFiles.forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = (e) => {
                const previewItem = document.createElement('div');
                previewItem.className = 'preview-item';
                previewItem.innerHTML = `
                    <img src="${e.target.result}" alt="${file.name}">
                    <button type="button" class="remove-btn" onclick="removeFile(${index})">
                        <i class="fas fa-times"></i>
                    </button>
                `;
                previewGrid.appendChild(previewItem);
            };
            reader.readAsDataURL(file);
        });

        // Sembunyikan upload area dan tampilkan preview
        if (selectedFiles.length > 0) {
            uploadArea.style.display = 'none';
            previewArea.style.display = 'block';
        } else {
            uploadArea.style.display = 'flex';
            previewArea.style.display = 'none';
        }
    }

    function updateSubmitButton() {
        submitBtn.disabled = selectedFiles.length === 0;
    }

    window.removeFile = function(index) {
        selectedFiles.splice(index, 1);
        updatePreview();
        updateSubmitButton();
        
        // Jika tidak ada file yang dipilih, reset input file
        if (selectedFiles.length === 0) {
            fileInput.value = '';
        }
    };

    // Form submission
    document.getElementById('galeriForm').addEventListener('submit', function(e) {
        if (selectedFiles.length === 0) {
            e.preventDefault();
            alert('Harap pilih minimal satu foto!');
            return;
        }

        // Update file input with selected files
        const dt = new DataTransfer();
        selectedFiles.forEach(file => dt.items.add(file));
        fileInput.files = dt.files;
    });
});
</script>
@endsection

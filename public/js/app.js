// Modern İnsan Kaynakları Sistemi JavaScript

document.addEventListener('DOMContentLoaded', function() {
    // Sidebar Toggle
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('mainContent');
    const sidebarToggle = document.getElementById('sidebarToggle');
    const menuToggle = document.getElementById('menuToggle');
    
    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', function() {
            sidebar.classList.toggle('collapsed');
            mainContent.classList.toggle('expanded');
        });
    }
    
    if (menuToggle) {
        menuToggle.addEventListener('click', function() {
            sidebar.classList.toggle('show');
        });
    }
    
    // Notification System
    const notificationBtn = document.getElementById('notificationBtn');
    const notificationPanel = document.getElementById('notificationPanel');
    const closeNotifications = document.getElementById('closeNotifications');
    
    if (notificationBtn && notificationPanel) {
        notificationBtn.addEventListener('click', function() {
            notificationPanel.classList.toggle('show');
        });
    }
    
    if (closeNotifications && notificationPanel) {
        closeNotifications.addEventListener('click', function() {
            notificationPanel.classList.remove('show');
        });
    }
    
    // Close notifications when clicking outside
    document.addEventListener('click', function(event) {
        if (notificationPanel && !notificationPanel.contains(event.target) && 
            !notificationBtn.contains(event.target)) {
            notificationPanel.classList.remove('show');
        }
    });
    
    // Mobile sidebar close when clicking outside
    document.addEventListener('click', function(event) {
        if (window.innerWidth <= 1024 && sidebar && !sidebar.contains(event.target) && 
            !menuToggle.contains(event.target)) {
            sidebar.classList.remove('show');
        }
    });
    
    // Charts Initialization
    initializeCharts();
    
    // Data Tables
    initializeDataTables();
    
    // Form Validation
    initializeFormValidation();
    
    // Search Functionality
    initializeSearch();
    
    // Auto-save forms
    initializeAutoSave();
});

// Charts Initialization
function initializeCharts() {
    // Employee Statistics Chart
    const employeeChart = document.getElementById('employeeChart');
    if (employeeChart) {
        new Chart(employeeChart, {
            type: 'doughnut',
            data: {
                labels: ['Aktif', 'İzinli', 'Pasif'],
                datasets: [{
                    data: [85, 10, 5],
                    backgroundColor: [
                        '#10b981',
                        '#f59e0b',
                        '#ef4444'
                    ],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    }
    
    // Attendance Chart
    const attendanceChart = document.getElementById('attendanceChart');
    if (attendanceChart) {
        new Chart(attendanceChart, {
            type: 'line',
            data: {
                labels: ['Pzt', 'Sal', 'Çar', 'Per', 'Cum', 'Cmt', 'Paz'],
                datasets: [{
                    label: 'Devam Oranı (%)',
                    data: [95, 92, 98, 94, 96, 88, 85],
                    borderColor: '#4f46e5',
                    backgroundColor: 'rgba(79, 70, 229, 0.1)',
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100
                    }
                }
            }
        });
    }
    
    // Department Distribution Chart
    const departmentChart = document.getElementById('departmentChart');
    if (departmentChart) {
        new Chart(departmentChart, {
            type: 'bar',
            data: {
                labels: ['Mutfak', 'Servis', 'Muhasebe', 'İK', 'Satış', 'Pazarlama'],
                datasets: [{
                    label: 'Çalışan Sayısı',
                    data: [12, 8, 4, 3, 6, 5],
                    backgroundColor: [
                        '#4f46e5',
                        '#10b981',
                        '#f59e0b',
                        '#ef4444',
                        '#06b6d4',
                        '#8b5cf6'
                    ],
                    borderRadius: 8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }
}

// Data Tables Initialization
function initializeDataTables() {
    const tables = document.querySelectorAll('.data-table');
    
    tables.forEach(table => {
        if (table) {
            // Add search functionality
            const searchInput = document.createElement('input');
            searchInput.type = 'text';
            searchInput.placeholder = 'Ara...';
            searchInput.className = 'form-control mb-3';
            searchInput.style.maxWidth = '300px';
            
            table.parentNode.insertBefore(searchInput, table);
            
            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                const rows = table.querySelectorAll('tbody tr');
                
                rows.forEach(row => {
                    const text = row.textContent.toLowerCase();
                    row.style.display = text.includes(searchTerm) ? '' : 'none';
                });
            });
            
            // Add pagination
            const rowsPerPage = 10;
            const totalRows = table.querySelectorAll('tbody tr').length;
            const totalPages = Math.ceil(totalRows / rowsPerPage);
            
            if (totalPages > 1) {
                createPagination(table, totalPages, rowsPerPage);
            }
        }
    });
}

// Create Pagination
function createPagination(table, totalPages, rowsPerPage) {
    const paginationContainer = document.createElement('div');
    paginationContainer.className = 'd-flex justify-content-between align-items-center mt-3';
    
    const info = document.createElement('span');
    info.className = 'text-muted';
    info.textContent = `Toplam ${table.querySelectorAll('tbody tr').length} kayıt`;
    
    const pagination = document.createElement('nav');
    pagination.innerHTML = `
        <ul class="pagination pagination-sm mb-0">
            <li class="page-item">
                <button class="page-link" data-page="prev">Önceki</button>
            </li>
            <li class="page-item">
                <button class="page-link" data-page="next">Sonraki</button>
            </li>
        </ul>
    `;
    
    paginationContainer.appendChild(info);
    paginationContainer.appendChild(pagination);
    table.parentNode.appendChild(paginationContainer);
    
    // Pagination functionality
    let currentPage = 1;
    showPage(table, currentPage, rowsPerPage);
    
    pagination.addEventListener('click', function(e) {
        if (e.target.tagName === 'BUTTON') {
            const action = e.target.dataset.page;
            if (action === 'prev' && currentPage > 1) {
                currentPage--;
            } else if (action === 'next' && currentPage < totalPages) {
                currentPage++;
            }
            showPage(table, currentPage, rowsPerPage);
        }
    });
}

// Show Specific Page
function showPage(table, page, rowsPerPage) {
    const rows = table.querySelectorAll('tbody tr');
    const start = (page - 1) * rowsPerPage;
    const end = start + rowsPerPage;
    
    rows.forEach((row, index) => {
        row.style.display = (index >= start && index < end) ? '' : 'none';
    });
}

// Form Validation
function initializeFormValidation() {
    const forms = document.querySelectorAll('.needs-validation');
    
    forms.forEach(form => {
        form.addEventListener('submit', function(event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        });
        
        // Real-time validation
        const inputs = form.querySelectorAll('input, select, textarea');
        inputs.forEach(input => {
            input.addEventListener('blur', function() {
                validateField(this);
            });
            
            input.addEventListener('input', function() {
                if (this.classList.contains('is-invalid')) {
                    validateField(this);
                }
            });
        });
    });
}

// Validate Individual Field
function validateField(field) {
    const value = field.value.trim();
    const fieldName = field.name;
    let isValid = true;
    let errorMessage = '';
    
    // Required validation
    if (field.hasAttribute('required') && !value) {
        isValid = false;
        errorMessage = 'Bu alan zorunludur.';
    }
    
    // Email validation
    if (fieldName === 'email' && value && !isValidEmail(value)) {
        isValid = false;
        errorMessage = 'Geçerli bir e-posta adresi giriniz.';
    }
    
    // Phone validation
    if (fieldName === 'phone' && value && !isValidPhone(value)) {
        isValid = false;
        errorMessage = 'Geçerli bir telefon numarası giriniz.';
    }
    
    // Update field state
    if (isValid) {
        field.classList.remove('is-invalid');
        field.classList.add('is-valid');
        removeErrorMessage(field);
    } else {
        field.classList.remove('is-valid');
        field.classList.add('is-invalid');
        showErrorMessage(field, errorMessage);
    }
}

// Show Error Message
function showErrorMessage(field, message) {
    removeErrorMessage(field);
    
    const errorDiv = document.createElement('div');
    errorDiv.className = 'invalid-feedback';
    errorDiv.textContent = message;
    
    field.parentNode.appendChild(errorDiv);
}

// Remove Error Message
function removeErrorMessage(field) {
    const existingError = field.parentNode.querySelector('.invalid-feedback');
    if (existingError) {
        existingError.remove();
    }
}

// Validation Helpers
function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

function isValidPhone(phone) {
    const phoneRegex = /^[\+]?[0-9\s\-\(\)]{10,}$/;
    return phoneRegex.test(phone);
}

// Search Functionality
function initializeSearch() {
    const searchInputs = document.querySelectorAll('.search-input');
    
    searchInputs.forEach(input => {
        input.addEventListener('input', debounce(function() {
            const searchTerm = this.value.toLowerCase();
            const targetTable = this.dataset.target;
            const table = document.querySelector(targetTable);
            
            if (table) {
                const rows = table.querySelectorAll('tbody tr');
                
                rows.forEach(row => {
                    const text = row.textContent.toLowerCase();
                    row.style.display = text.includes(searchTerm) ? '' : 'none';
                });
            }
        }, 300));
    });
}

// Debounce Function
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// Auto-save Forms
function initializeAutoSave() {
    const forms = document.querySelectorAll('.auto-save');
    
    forms.forEach(form => {
        const inputs = form.querySelectorAll('input, select, textarea');
        
        inputs.forEach(input => {
            input.addEventListener('change', debounce(function() {
                saveFormData(form);
            }, 1000));
        });
    });
}

// Save Form Data
function saveFormData(form) {
    const formData = new FormData(form);
    const data = {};
    
    for (let [key, value] of formData.entries()) {
        data[key] = value;
    }
    
    // Save to localStorage
    const formId = form.id || 'form_' + Math.random().toString(36).substr(2, 9);
    localStorage.setItem('form_' + formId, JSON.stringify(data));
    
    // Show save indicator
    showSaveIndicator(form);
}

// Show Save Indicator
function showSaveIndicator(form) {
    let indicator = form.querySelector('.save-indicator');
    
    if (!indicator) {
        indicator = document.createElement('div');
        indicator.className = 'save-indicator text-success small mt-2';
        form.appendChild(indicator);
    }
    
    indicator.textContent = 'Otomatik kaydedildi';
    indicator.style.opacity = '1';
    
    setTimeout(() => {
        indicator.style.opacity = '0';
    }, 2000);
}

// Utility Functions
function showLoading(element) {
    element.classList.add('loading');
    element.disabled = true;
}

function hideLoading(element) {
    element.classList.remove('loading');
    element.disabled = false;
}

function showToast(message, type = 'info') {
    const toast = document.createElement('div');
    toast.className = `toast toast-${type} position-fixed`;
    toast.style.cssText = 'top: 20px; right: 20px; z-index: 9999;';
    toast.innerHTML = `
        <div class="toast-body">
            ${message}
        </div>
    `;
    
    document.body.appendChild(toast);
    
    // Show toast
    setTimeout(() => {
        toast.style.opacity = '1';
        toast.style.transform = 'translateX(0)';
    }, 100);
    
    // Hide toast after 3 seconds
    setTimeout(() => {
        toast.style.opacity = '0';
        toast.style.transform = 'translateX(100%)';
        setTimeout(() => {
            document.body.removeChild(toast);
        }, 300);
    }, 3000);
}

// Export Functions
function exportToCSV(tableId, filename = 'export.csv') {
    const table = document.getElementById(tableId);
    if (!table) return;
    
    const rows = table.querySelectorAll('tr');
    let csv = [];
    
    rows.forEach(row => {
        const cols = row.querySelectorAll('td, th');
        const rowData = [];
        
        cols.forEach(col => {
            rowData.push('"' + col.textContent.replace(/"/g, '""') + '"');
        });
        
        csv.push(rowData.join(','));
    });
    
    const csvContent = csv.join('\n');
    const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
    const link = document.createElement('a');
    
    if (link.download !== undefined) {
        const url = URL.createObjectURL(blob);
        link.setAttribute('href', url);
        link.setAttribute('download', filename);
        link.style.visibility = 'hidden';
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }
}

// Print Function
function printElement(elementId) {
    const element = document.getElementById(elementId);
    if (!element) return;
    
    const printWindow = window.open('', '_blank');
    printWindow.document.write(`
        <html>
            <head>
                <title>Yazdır</title>
                <link href="/css/style.css" rel="stylesheet">
                <style>
                    @media print {
                        .no-print { display: none !important; }
                        body { margin: 0; padding: 20px; }
                    }
                </style>
            </head>
            <body>
                ${element.outerHTML}
            </body>
        </html>
    `);
    
    printWindow.document.close();
    printWindow.focus();
    
    setTimeout(() => {
        printWindow.print();
        printWindow.close();
    }, 500);
}

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Bellford Academy')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        :root {
            --primary-color: #0f4c75;
            --secondary-color: #3282b8;
            --accent-color: #ff6b35;
            --dark-teal: #0a3d62;
            --light-bg: #f8fafc;
            --dark-text: #1e293b;
            --light-text: #64748b;
            --orange: #ff6b35;
            --orange-light: #ff8c5a;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
            color: var(--dark-text);
            background: #ffffff;
            overflow-x: hidden;
            position: relative;
        }
        
        
        /* Top Bar */
        .top-bar {
            background: var(--dark-teal);
            color: white;
            padding: 12px 0;
            font-size: 14px;
            position: relative;
            z-index: 100;
        }
        
        .top-bar-left {
            display: flex;
            gap: 30px;
            align-items: center;
        }
        
        .top-bar-left span {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .top-bar-left i {
            font-size: 12px;
        }
        
        .top-bar-right {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 20px;
        }
        
        .social-icons-top {
            display: flex;
            gap: 15px;
        }
        
        .social-icons-top a {
            color: white;
            font-size: 14px;
            transition: color 0.3s ease;
        }
        
        .social-icons-top a:hover {
            color: var(--orange);
        }
        
        .phone-number {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        /* Main Navigation */
        .main-nav {
            background: white;
            padding: 20px 0;
            position: relative;
            z-index: 99;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }
        
        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .logo-icon {
            width: 52px;
            height: 52px;
            background: white;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            position: relative;
            padding: 4px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        
        .logo-icon::after {
            content: '';
            position: absolute;
            top: -6px;
            right: -6px;
            width: 16px;
            height: 16px;
            background: var(--orange);
            border-radius: 50%;
        }
        
        .logo-icon img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
        
        .logo-icon i {
            font-size: 1.4rem;
        }
        
        .logo-text {
            display: flex;
            flex-direction: column;
            line-height: 1.1;
        }
        
        .logo-title {
            color: var(--dark-teal);
            font-size: 1.1rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }
        
        .logo-subtitle {
            color: var(--light-text);
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 3px;
        }
        
        .nav-actions {
            display: flex;
            align-items: center;
            gap: 20px;
            justify-content: flex-end;
        }
        
        .nav-icon {
            color: var(--dark-teal);
            font-size: 18px;
            transition: color 0.3s ease;
        }
        
        .nav-icon:hover {
            color: var(--orange);
        }
        
        .profile-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--dark-teal);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .profile-icon:hover {
            background: var(--orange);
            transform: scale(1.1);
        }
        
        .nav-links {
            list-style: none;
            display: flex;
            gap: 40px;
            margin: 0;
            padding: 0;
        }
        
        .nav-links a {
            color: var(--dark-teal);
            text-decoration: none;
            font-weight: 600;
            font-size: 15px;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            position: relative;
            padding: 8px 15px;
        }
        
        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 2px;
            background: var(--orange);
            transition: width 0.3s ease;
        }
        
        .nav-links a:hover::after,
        .nav-links a.active::after {
            width: 80%;
        }
        
        .nav-links a:hover,
        .nav-links a.active {
            color: var(--orange);
        }
        
        .secondary-links {
            list-style: none;
            display: flex;
            gap: 25px;
            margin: 0;
            padding: 0;
            justify-content: flex-end;
        }
        
        .secondary-links a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            font-weight: 500;
            font-size: 13px;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            padding: 8px 15px;
            border-radius: 20px;
            text-transform: uppercase;
        }
        
        .secondary-links a:hover {
            color: white;
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
        }
        
        /* Hero Section */
        .hero-section {
            position: relative;
            min-height: 65vh;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            padding-bottom: 50px;
        }
        
        .hero-image-wrapper {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-position: center;
        }
        
        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(10, 61, 98, 0.7);
            z-index: 1;
        }
        
        .hero-geometric-shape {
            position: absolute;
            right: -100px;
            top: 50%;
            transform: translateY(-50%);
            width: 400px;
            height: 400px;
            background: var(--orange);
            clip-path: polygon(50% 0%, 100% 50%, 50% 100%, 0% 50%);
            opacity: 0.3;
            z-index: 2;
        }
        
        
        .hero-content {
            position: relative;
            z-index: 10;
            padding: 90px 0 50px;
            flex: 1;
        }
        
        .hero-title {
            font-size: 3rem;
            font-weight: 800;
            color: white;
            margin-bottom: 20px;
            line-height: 1.15;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }
        
        .hero-description {
            font-size: 1.05rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 30px;
            line-height: 1.7;
            max-width: 560px;
        }
        
        .hero-btn {
            background: var(--orange);
            color: white;
            padding: 18px 40px;
            text-decoration: none;
            font-weight: 700;
            font-size: 16px;
            border-radius: 5px;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 5px 20px rgba(255, 107, 53, 0.4);
        }
        
        .hero-btn:hover {
            background: var(--orange-light);
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(255, 107, 53, 0.5);
            color: white;
        }
        
        .hero-feature-cards {
            position: relative;
            z-index: 10;
            margin-top: -50px;
        }
        
        .feature-card {
            background: white;
            padding: 40px 30px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: all 0.3s ease;
            height: 100%;
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }
        
        .feature-icon {
            width: 70px;
            height: 70px;
            background: var(--dark-teal);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            font-size: 28px;
        }
        
        .feature-card h3 {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--dark-teal);
            margin-bottom: 15px;
        }
        
        .feature-card p {
            color: var(--light-text);
            line-height: 1.6;
            margin: 0;
        }
        
        /* Committed Section */
        .committed-section {
            padding: 90px 0;
            background: white;
        }
        
        .committed-image-wrapper {
            position: relative;
        }
        
        .committed-image-frame {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
        }
        
        .committed-image-frame::before {
            content: '';
            position: absolute;
            top: -20px;
            left: -20px;
            width: 100%;
            height: 100%;
            border: 3px dashed var(--orange);
            border-radius: 20px;
            z-index: -1;
        }
        
        .committed-image-frame img {
            width: 100%;
            height: 500px;
            object-fit: cover;
            border-radius: 20px;
        }
        
        .committed-content h2 {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--dark-teal);
            margin-bottom: 25px;
            line-height: 1.3;
        }
        
        .committed-content p {
            font-size: 1.1rem;
            color: var(--light-text);
            line-height: 1.8;
            margin-bottom: 30px;
        }
        
        .committed-features {
            list-style: none;
            padding: 0;
            margin: 0 0 35px 0;
        }
        
        .committed-features li {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }
        
        .feature-bullet {
            width: 30px;
            height: 30px;
            background: var(--orange);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        
        .committed-features span {
            font-size: 1rem;
            color: var(--dark-text);
            font-weight: 500;
        }
        
        .about-btn {
            background: var(--orange);
            color: white;
            padding: 15px 35px;
            text-decoration: none;
            font-weight: 700;
            border-radius: 5px;
            display: inline-block;
            transition: all 0.3s ease;
        }
        
        .about-btn:hover {
            background: var(--orange-light);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(255, 107, 53, 0.4);
            color: white;
        }
        
        /* Gallery Solutions Section */
        .gallery-solutions-section {
            padding: 90px 0;
            background: var(--light-bg);
        }
        
        .solutions-title {
            font-size: 2.4rem;
            font-weight: 800;
            color: var(--dark-teal);
            margin-bottom: 0;
        }
        
        .solutions-description {
            font-size: 1rem;
            color: var(--light-text);
            line-height: 1.7;
            margin: 0;
        }
        
        .solutions-grid {
            margin-top: 60px;
        }
        
        .solution-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        
        .solution-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
        }
        
        .solution-image {
            width: 100%;
            height: 250px;
            overflow: hidden;
        }
        
        .solution-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        
        .solution-card:hover .solution-image img {
            transform: scale(1.1);
        }
        
        .solution-content {
            padding: 30px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }
        
        .solution-icon {
            width: 50px;
            height: 50px;
            background: var(--dark-teal);
            color: white;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            margin-bottom: 20px;
        }
        
        .solution-content h3 {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--dark-teal);
            margin-bottom: 15px;
        }
        
        .solution-content p {
            color: var(--light-text);
            line-height: 1.8;
            margin-bottom: 20px;
            flex: 1;
        }
        
        .read-more-link {
            color: var(--orange);
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
        }
        
        .read-more-link:hover {
            gap: 12px;
            color: var(--orange-light);
        }
        
        /* How We Operate Section */
        .how-we-operate-section {
            padding: 90px 0;
            background: white;
        }
        
        .operate-title {
            font-size: 2.4rem;
            font-weight: 800;
            color: var(--dark-teal);
            text-align: center;
            margin-bottom: 60px;
        }
        
        .operate-steps {
            position: relative;
        }
        
        .operate-step {
            text-align: center;
            padding: 30px 20px;
            position: relative;
        }
        
        .step-number {
            font-size: 1rem;
            font-weight: 700;
            color: var(--orange);
            margin-bottom: 20px;
        }
        
        .step-icon {
            width: 80px;
            height: 80px;
            background: var(--dark-teal);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            font-size: 32px;
            transition: all 0.3s ease;
        }
        
        .operate-step:hover .step-icon {
            background: var(--orange);
            transform: scale(1.1);
        }
        
        .operate-step h3 {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--dark-teal);
            margin-bottom: 15px;
        }
        
        .operate-step p {
            color: var(--light-text);
            line-height: 1.7;
            margin: 0;
        }
        
        /* Contact Form Section */
        .contact-form-section {
            padding: 90px 0;
            background: var(--light-bg);
        }
        
        .contact-image {
            height: 100%;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }
        
        .contact-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            min-height: 600px;
        }
        
        .contact-form-wrapper {
            background: var(--dark-teal);
            padding: 60px 50px;
            border-radius: 15px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }
        
        .contact-form-wrapper h2 {
            font-size: 2.5rem;
            font-weight: 800;
            color: white;
            margin-bottom: 40px;
        }
        
        .contact-form .form-group {
            margin-bottom: 25px;
        }
        
        .contact-form .form-control {
            width: 100%;
            padding: 15px 20px;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }
        
        .contact-form .form-control::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }
        
        .contact-form .form-control:focus {
            outline: none;
            background: rgba(255, 255, 255, 0.15);
            border-color: var(--orange);
        }
        
        .contact-form textarea.form-control {
            resize: vertical;
        }
        
        .submit-btn {
            background: var(--orange);
            color: white;
            border: none;
            padding: 18px 45px;
            font-weight: 700;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
        }
        
        .submit-btn:hover {
            background: var(--orange-light);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(255, 107, 53, 0.4);
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }
        
        @keyframes shimmer {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }
        
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-10px); }
            60% { transform: translateY(-5px); }
        }
        
        /* Categories Section */
        .categories-section {
            padding: 120px 0;
            background: #f8fafc;
            position: relative;
            z-index: 10;
        }
        
        .category-card {
            background: #ffffff;
            padding: 40px 30px;
            height: 100%;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            transition: all 0.3s ease;
            border: 1px solid #e2e8f0;
            position: relative;
            overflow: hidden;
        }
        
        .category-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--primary-color);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }
        
        .category-card:hover::before {
            transform: scaleX(1);
        }
        
        .category-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(30, 64, 175, 0.1);
            border-color: #1e3a8a;
        }
        
        .category-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #e2e8f0;
        }
        
        .category-header h3 {
            font-size: 1.5rem;
            font-weight: 800;
            color: #1e3a8a;
            margin: 0;
        }
        
        .category-header i {
            color: #64748b;
            font-size: 18px;
            transition: all 0.3s ease;
        }
        
        .category-card:hover .category-header i {
            color: #1e3a8a;
            transform: translateX(5px);
        }
        
        .category-content ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .category-content li {
            padding: 12px 0;
            color: #64748b;
            font-weight: 500;
            border-bottom: 1px solid #f1f5f9;
            transition: all 0.3s ease;
            position: relative;
        }
        
        .category-content li::before {
            content: '▶';
            color: #1e3a8a;
            margin-right: 10px;
            font-size: 12px;
            transition: all 0.3s ease;
        }
        
        .category-content li:hover {
            color: #1e3a8a;
            transform: translateX(10px);
        }
        
        .category-content li:hover::before {
            transform: scale(1.2);
        }
        
        .category-content li:last-child {
            border-bottom: none;
        }
        
        .category-image {
            margin-top: 30px;
        }
        
        .category-image img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 15px;
            transition: all 0.3s ease;
        }
        
        .category-card:hover .category-image img {
            transform: scale(1.05);
            box-shadow: 0 10px 25px rgba(30, 64, 175, 0.2);
        }
        
        /* Welcome Section */
        .welcome-section {
            padding: 120px 0;
            background: rgba(255, 255, 255, 0.02);
            backdrop-filter: blur(40px);
            position: relative;
            z-index: 10;
            border-top: 1px solid rgba(59, 130, 246, 0.2);
            border-bottom: 1px solid rgba(59, 130, 246, 0.2);
        }
        
        .welcome-content h2 {
            font-size: 3.5rem;
            font-weight: 900;
            color: #1e3a8a;
            margin-bottom: 30px;
            line-height: 1.2;
        }
        
        .welcome-content p {
            font-size: 1.3rem;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 40px;
            line-height: 1.8;
        }
        
        .more-link {
            color: #1e3a8a;
            text-decoration: none;
            font-weight: 700;
            font-size: 18px;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 12px;
            padding: 15px 30px;
            border-radius: 25px;
            background: rgba(59, 130, 246, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(59, 130, 246, 0.2);
        }
        
        /* Gallery Section */
        .gallery-section {
            padding: 80px 0;
            background-color: #f8fafc;
        }
        
        .section-header {
            margin-bottom: 50px;
        }
        
        .section-title {
            font-size: 2.2rem;
            color: var(--dark-teal);
            margin-bottom: 12px;
            font-weight: 700;
            position: relative;
            display: inline-block;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: var(--orange);
            border-radius: 2px;
        }
        
        .section-subtitle {
            color: var(--light-text);
            font-size: 1rem;
            margin-top: 12px;
        }
        
        .gallery-item {
            position: relative;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            height: 100%;
        }
        
        .gallery-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }
        
        .gallery-item img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: all 0.5s ease;
        }
        
        .gallery-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(15, 76, 117, 0.9);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: all 0.3s ease;
            padding: 20px;
            text-align: center;
        }
        
        .gallery-item:hover .gallery-overlay {
            opacity: 1;
        }
        
        .gallery-info h3 {
            color: white;
            font-size: 1.3rem;
            margin-bottom: 8px;
            font-weight: 600;
        }
        
        .gallery-info p {
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 16px;
            font-size: 0.9rem;
        }
        
        .btn-view-more {
            display: inline-block;
            padding: 10px 25px;
            background: var(--orange);
            color: white;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 500;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }
        
        .btn-view-more:hover {
            background: transparent;
            border-color: white;
            color: white;
        }
        
        .more-link:hover {
            color: white;
            background: rgba(59, 130, 246, 0.3);
            transform: translateX(10px);
            box-shadow: 0 10px 25px rgba(59, 130, 246, 0.3);
        }
        
        .more-link i {
            transition: transform 0.3s ease;
        }
        
        .more-link:hover i {
            transform: translateX(5px);
        }
        
        .welcome-image img {
            width: 100%;
            height: 450px;
            object-fit: cover;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        
        .welcome-image img:hover {
            transform: scale(1.02);
        }
        
        /* Informasi Section */
        .informasi-section {
            padding: 120px 0;
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(40px);
            position: relative;
            z-index: 10;
            border-top: 1px solid rgba(59, 130, 246, 0.2);
            border-bottom: 1px solid rgba(59, 130, 246, 0.2);
        }
        
        .informasi-header h2 {
            font-size: 2.6rem;
            font-weight: 800;
            color: #1e3a8a;
            margin-bottom: 18px;
        }
        
        .informasi-header p {
            font-size: 1.05rem;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 0;
        }
        
        .informasi-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
            margin-top: 60px;
        }
        
        .informasi-item {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(40px);
            border-radius: 25px;
            padding: 35px;
            border: 1px solid rgba(59, 130, 246, 0.2);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            overflow: hidden;
        }
        
        .informasi-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.1) 0%, rgba(139, 92, 246, 0.1) 50%, rgba(34, 197, 94, 0.1) 100%);
            opacity: 0;
            transition: opacity 0.4s ease;
            z-index: 0;
        }
        
        .informasi-item:hover::before {
            opacity: 1;
        }
        
        .informasi-item:hover {
            transform: translateY(-15px) scale(1.03);
            box-shadow: 0 40px 80px rgba(59, 130, 246, 0.3);
            border-color: rgba(59, 130, 246, 0.4);
        }
        
        .informasi-item > * {
            position: relative;
            z-index: 1;
        }
        
        .informasi-meta {
            display: flex;
            gap: 15px;
            margin-bottom: 15px;
        }
        
        .informasi-date {
            background: linear-gradient(135deg, #1e3a8a 0%, #8b5cf6 50%, #22c55e 100%);
            color: white;
            padding: 8px 15px;
            border-radius: 25px;
            font-size: 0.9rem;
            font-weight: 600;
        }
        
        .informasi-category {
            background: rgba(59, 130, 246, 0.1);
            color: #1e3a8a;
            padding: 8px 15px;
            border-radius: 25px;
            font-size: 0.9rem;
            font-weight: 600;
            border: 1px solid rgba(59, 130, 246, 0.2);
        }
        
        .informasi-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: white;
            margin-bottom: 15px;
            line-height: 1.3;
        }
        
        .informasi-excerpt {
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 20px;
            line-height: 1.6;
        }
        
        .informasi-link {
            color: #1e3a8a;
            text-decoration: none;
            font-weight: 700;
            font-size: 15px;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            border-radius: 20px;
            background: rgba(59, 130, 246, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(59, 130, 246, 0.2);
        }
        
        .informasi-link:hover {
            color: white;
            background: rgba(59, 130, 246, 0.3);
            transform: translateX(5px);
            box-shadow: 0 8px 20px rgba(59, 130, 246, 0.3);
        }
        
        .informasi-link i {
            transition: transform 0.3s ease;
        }
        
        .informasi-link:hover i {
            transform: translateX(5px);
        }
        
        /* About Content Section */
        .about-content-section {
            padding: 100px 0;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(25px);
            position: relative;
            z-index: 10;
        }
        
        .about-content h2 {
            font-size: 2.5rem;
            font-weight: 900;
            color: #1e3a8a;
            margin-bottom: 30px;
            margin-top: 50px;
        }
        
        .about-content h2:first-child {
            margin-top: 0;
        }
        
        .about-content h3 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1e3a8a;
            margin-bottom: 15px;
            margin-top: 30px;
        }
        
        .about-content p {
            font-size: 1.1rem;
            color: #666;
            margin-bottom: 20px;
            line-height: 1.8;
        }
        
        .about-content ul {
            margin-bottom: 30px;
        }
        
        .about-content li {
            font-size: 1.1rem;
            color: #666;
            margin-bottom: 10px;
            line-height: 1.6;
        }
        
        .program-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin: 40px 0;
        }
        
        .program-item {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(25px);
            border-radius: 15px;
            padding: 25px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        
        .program-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
        
        .program-item h4 {
            font-size: 1.2rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 10px;
        }
        
        .program-item p {
            font-size: 1rem;
            color: #666;
            margin: 0;
        }
        
        /* Contact Content Section */
        .contact-content-section {
            padding: 100px 0;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(25px);
            position: relative;
            z-index: 10;
        }
        
        .contact-form h2 {
            font-size: 2.5rem;
            font-weight: 900;
            color: #1e3a8a;
            margin-bottom: 40px;
        }
        
        .form-group {
            margin-bottom: 25px;
        }
        
        .form-group label {
            display: block;
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
        }
        
        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.9);
        }
        
        .form-control:focus {
            outline: none;
            border-color: #1e3a8a;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
        
        .submit-btn {
            background: linear-gradient(135deg, #1e3a8a 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 15px 40px;
            font-weight: 700;
            font-size: 16px;
            letter-spacing: 1px;
            border-radius: 50px;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
        }
        
        .submit-btn:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 15px 35px rgba(102, 126, 234, 0.4);
        }
        
        .contact-info h2 {
            font-size: 2.5rem;
            font-weight: 900;
            color: #1e3a8a;
            margin-bottom: 40px;
        }
        
        .contact-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 30px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        
        .contact-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }
        
        .contact-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #1e3a8a 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 20px;
            flex-shrink: 0;
        }
        
        .contact-icon i {
            color: white;
            font-size: 20px;
        }
        
        .contact-details h4 {
            font-size: 1.2rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 8px;
        }
        
        .contact-details p {
            color: #666;
            margin: 0;
            line-height: 1.6;
        }
        
        .social-links {
            margin-top: 40px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        
        .social-links h4 {
            font-size: 1.2rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 15px;
        }
        
        .social-links .social-icons {
            display: flex;
            gap: 15px;
        }
        
        .social-links .social-icons a {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, #1e3a8a 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 18px;
            transition: all 0.3s ease;
        }
        
        .social-links .social-icons a:hover {
            transform: translateY(-3px) scale(1.1);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
        }
        
        /* Gallery Content Section */
        .gallery-content-section {
            padding: 80px 0;
            background: #fff;
            position: relative;
            z-index: 10;
        }
        
        .gallery-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }
        
        .gallery-header {
            text-align: center;
            margin-bottom: 40px;
            padding: 0 15px;
        }
        
        .gallery-header h2 {
            font-size: 2.5rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 15px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .gallery-header p {
            font-size: 1.1rem;
            color: #718096;
            max-width: 700px;
            margin: 0 auto;
            line-height: 1.8;
        }
        
        .gallery-tabs {
            display: flex;
            justify-content: center;
            margin-bottom: 40px;
            flex-wrap: wrap;
            gap: 8px;
            padding: 0 15px;
        }
        
        .tab-btn {
            background: #f7fafc;
            border: 1px solid #e2e8f0;
            padding: 8px 24px;
            border-radius: 30px;
            margin: 0 4px;
            cursor: pointer;
            font-size: 0.95rem;
            font-weight: 500;
            color: #4a5568;
            transition: all 0.3s ease;
        }
        
        .tab-btn.active,
        .tab-btn:hover {
            background: #3182ce;
            color: white;
            border-color: #3182ce;
            transform: translateY(-2px);
            box-shadow: 0 4px 6px -1px rgba(49, 130, 206, 0.3);
        }
        
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 25px;
            padding: 0 15px;
        }
        
        .gallery-item {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            border: 1px solid #edf2f7;
        }
        
        .gallery-item:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        .gallery-image {
            position: relative;
            overflow: hidden;
            height: 200px;
        }
        
        .gallery-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .gallery-item:hover .gallery-image img {
            transform: scale(1.05);
        }
        
        .gallery-info {
            padding: 18px 20px;
            background: #fff;
        }
        
        .gallery-info h3 {
            font-size: 1.1rem;
            color: #2d3748;
            margin: 0 0 8px 0;
            font-weight: 600;
            line-height: 1.4;
        }
        
        .gallery-info p {
            font-size: 0.9rem;
            color: #718096;
            margin: 0;
            display: flex;
            align-items: center;
            font-weight: 500;
        }
        
        .gallery-info p i {
            margin-right: 8px;
            color: #a0aec0;
            font-size: 0.9em;
        }
        
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 50px;
            gap: 8px;
            padding: 0 15px;
        }
        
        .page-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 42px;
            height: 42px;
            border-radius: 8px;
            background: #f8fafc;
            color: #4a5568;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.2s ease;
            border: 1px solid #e2e8f0;
            font-size: 0.95rem;
        }
        
        .page-link:hover {
            background: #edf2f7;
            color: #2d3748;
        }
        
        .page-link.active {
            background: #3182ce;
            color: white;
            border-color: #3182ce;
            transform: translateY(-2px);
            box-shadow: 0 4px 6px -1px rgba(49, 130, 206, 0.3);
        }
        
        .page-link.prev,
        .page-link.next {
            width: auto;
            padding: 0 16px;
            font-weight: 500;
        }
        
        .gallery-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.8) 0%, rgba(118, 75, 162, 0.8) 100%);
            opacity: 0;
            transition: opacity 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .gallery-item:hover .gallery-overlay {
            opacity: 1;
        }
        
        .gallery-info {
            text-align: center;
            color: white;
            padding: 20px;
        }
        
        .gallery-info h4 {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        .gallery-info p {
            font-size: 1rem;
            margin-bottom: 10px;
            opacity: 0.9;
        }
        
        .gallery-date {
            font-size: 0.9rem;
            opacity: 0.8;
        }
        
        /* Information Content Section */
        .information-content-section {
            padding: 80px 0;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(25px);
            position: relative;
            z-index: 10;
        }
        
        .information-header h2 {
            font-size: 2.5rem;
            font-weight: 800;
            color: #1e3a8a;
            margin-bottom: 18px;
        }
        
        .information-header p {
            font-size: 1rem;
            color: #666;
            margin-bottom: 0;
        }
        
        .information-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
            margin-top: 60px;
        }
        
        .information-item {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(25px);
            border-radius: 20px;
            padding: 30px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        
        .information-item:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.15);
        }
        
        .information-meta {
            display: flex;
            gap: 15px;
            margin-bottom: 15px;
        }
        
        .information-date {
            background: linear-gradient(135deg, #1e3a8a 0%, #764ba2 100%);
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }
        
        .information-category {
            background: rgba(102, 126, 234, 0.1);
            color: #1e3a8a;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }
        
        .information-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 15px;
            line-height: 1.3;
        }
        
        .information-excerpt {
            color: #666;
            margin-bottom: 20px;
            line-height: 1.6;
        }
        
        .information-link {
            color: #1e3a8a;
            text-decoration: none;
            font-weight: 700;
            font-size: 14px;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        
        .information-link:hover {
            color: #764ba2;
            transform: translateX(5px);
        }
        
        .information-link i {
            transition: transform 0.3s ease;
        }
        
        .information-link:hover i {
            transform: translateX(5px);
        }
        
        /* Empty State */
        .empty-state {
            padding: 80px 20px;
            text-align: center;
        }
        
        .empty-state i {
            font-size: 4rem;
            color: #ccc;
            margin-bottom: 20px;
        }
        
        .empty-state h3 {
            font-size: 1.5rem;
            color: #666;
            margin-bottom: 10px;
        }
        
        .empty-state p {
            color: #999;
            font-size: 1rem;
        }
        
        /* Pagination */
        .pagination-wrapper {
            margin-top: 60px;
            display: flex;
            justify-content: center;
        }
        
        .pagination {
            display: flex;
            gap: 10px;
        }
        
        .pagination a,
        .pagination span {
            padding: 10px 15px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            text-decoration: none;
            color: #1e3a8a;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .pagination a:hover {
            background: linear-gradient(135deg, #1e3a8a 0%, #764ba2 100%);
            color: white;
            transform: translateY(-2px);
        }
        
        .pagination .active span {
            background: linear-gradient(135deg, #1e3a8a 0%, #764ba2 100%);
            color: white;
        }
        
        /* Information Detail Section */
        .information-detail-section {
            padding: 80px 0;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(25px);
            position: relative;
            z-index: 10;
        }
        
        .information-detail {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(25px);
            border-radius: 20px;
            padding: 50px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }
        
        .information-detail .information-meta {
            display: flex;
            gap: 15px;
            margin-bottom: 30px;
        }
        
        .information-detail .information-date {
            background: linear-gradient(135deg, #1e3a8a 0%, #764ba2 100%);
            color: white;
            padding: 8px 16px;
            border-radius: 25px;
            font-size: 0.9rem;
            font-weight: 600;
        }
        
        .information-detail .information-category {
            background: rgba(102, 126, 234, 0.1);
            color: #1e3a8a;
            padding: 8px 16px;
            border-radius: 25px;
            font-size: 0.9rem;
            font-weight: 600;
        }
        
        .information-detail .information-title {
            font-size: 2.5rem;
            font-weight: 900;
            color: #1e3a8a;
            margin-bottom: 30px;
            line-height: 1.2;
        }
        
        .information-detail .information-content {
            font-size: 1.1rem;
            color: #666;
            line-height: 1.8;
            margin-bottom: 40px;
        }
        
        .information-actions {
            text-align: center;
        }
        
        .back-btn {
            background: linear-gradient(135deg, #1e3a8a 0%, #764ba2 100%);
            color: white;
            text-decoration: none;
            padding: 15px 30px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 16px;
            letter-spacing: 1px;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            display: inline-flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
        }
        
        .back-btn:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 15px 35px rgba(102, 126, 234, 0.4);
            color: white;
        }
        
        .back-btn i {
            transition: transform 0.3s ease;
        }
        
        .back-btn:hover i {
            transform: translateX(-5px);
        }
        
        /* Collection Section */
        .collection-section {
            padding: 80px 0;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            position: relative;
            z-index: 10;
        }
        
        .collection-header h2 {
            font-size: 3rem;
            font-weight: 900;
            color: #1e3a8a;
            margin-bottom: 20px;
        }
        
        .collection-header p {
            font-size: 1.2rem;
            color: #666;
            margin-bottom: 0;
        }
        
        .view-all-link {
            color: #1e3a8a;
            text-decoration: none;
            font-weight: 700;
            font-size: 16px;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }
        
        .view-all-link:hover {
            color: #764ba2;
            transform: translateX(5px);
        }
        
        .view-all-link i {
            transition: transform 0.3s ease;
        }
        
        .view-all-link:hover i {
            transform: translateX(5px);
        }
        
        .collection-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 40px;
            margin-top: 60px;
        }
        
        .collection-item {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(25px);
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        
        .collection-item:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.15);
        }
        
        .collection-image img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        
        .collection-item:hover .collection-image img {
            transform: scale(1.05);
        }
        
        .collection-info {
            padding: 25px;
        }
        
        .collection-info h4 {
            font-size: 1.2rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 10px;
        }
        
        .collection-date {
            font-size: 1rem;
            color: #1e3a8a;
            font-weight: 600;
        }
        
        .load-more-btn {
            background: linear-gradient(135deg, #1e3a8a 0%, #764ba2 50%, #f093fb 100%);
            color: white;
            border: none;
            padding: 20px 45px;
            font-weight: 700;
            font-size: 18px;
            letter-spacing: 1px;
            margin-top: 50px;
            border-radius: 50px;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
            position: relative;
            overflow: hidden;
        }
        
        .load-more-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.6s;
        }
        
        .load-more-btn:hover::before {
            left: 100%;
        }
        
        .load-more-btn:hover {
            transform: translateY(-5px) scale(1.05);
            box-shadow: 0 20px 50px rgba(102, 126, 234, 0.6);
        }
        
        /* Footer */
        .main-footer {
            background: var(--dark-teal);
            color: white;
            padding: 60px 0 30px;
            position: relative;
            overflow: hidden;
            z-index: 10;
        }
        
        .footer-brand h3 {
            font-size: 1.8rem;
            font-weight: 800;
            margin-bottom: 10px;
            color: white;
        }
        
        .footer-brand p {
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 20px;
        }
        
        .footer-contact p {
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 5px;
        }
        
        .main-footer h4 {
            font-size: 1rem;
            font-weight: 700;
            margin-bottom: 20px;
            color: white;
        }
        
        .main-footer ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .main-footer ul li {
            margin-bottom: 8px;
        }
        
        .main-footer ul li a {
            color: #ccc;
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s ease;
        }
        
        .main-footer ul li a:hover {
            color: white;
        }
        
        .footer-bottom {
            border-top: 1px solid #333;
            margin-top: 40px;
            padding-top: 20px;
        }
        
        .social-icons {
            display: flex;
            gap: 15px;
        }
        
        .social-icons a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 45px;
            height: 45px;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border-radius: 50%;
            text-decoration: none;
            font-size: 18px;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .social-icons a:hover {
            transform: translateY(-5px) scale(1.1);
            box-shadow: 0 15px 35px rgba(255, 255, 255, 0.2);
            color: white;
            background: rgba(255, 255, 255, 0.2);
        }
        
        .footer-bottom p {
            color: rgba(255, 255, 255, 0.8);
            font-size: 14px;
            margin: 0;
        }
        
        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
        }
        
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #1e3a8a 0%, #764ba2 100%);
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, #764ba2 0%, #f093fb 100%);
        }
        
        /* Smooth transitions for all interactive elements */
        * {
            transition: all 0.3s ease;
        }
        
        /* Enhanced focus states */
        a:focus,
        button:focus,
        input:focus,
        textarea:focus {
            outline: 2px solid rgba(102, 126, 234, 0.5);
            outline-offset: 2px;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .top-bar-left {
                flex-direction: column;
                gap: 10px;
                align-items: flex-start;
            }
            
            .top-bar-right {
                flex-direction: column;
                gap: 10px;
                align-items: flex-end;
            }
            
            .nav-links {
                gap: 15px;
                flex-wrap: wrap;
            }
            
            .nav-links a {
                font-size: 13px;
                padding: 5px 10px;
            }
            
            .hero-section {
                min-height: 70vh;
                padding-bottom: 50px;
            }
            
            .hero-content {
                padding: 100px 0 50px;
            }
            
            .hero-title {
                font-size: 2.2rem;
            }
            
            .hero-description {
                font-size: 1rem;
            }
            
            .hero-geometric-shape {
                display: none;
            }
            
            .hero-feature-cards {
                margin-top: 30px;
            }
            
            .feature-card {
                margin-bottom: 20px;
            }
            
            .committed-content h2 {
                font-size: 1.8rem;
            }
            
            .committed-image-frame img {
                height: 300px;
            }
            
            .solutions-title {
                font-size: 2rem;
            }
            
            .operate-title {
                font-size: 2rem;
            }
            
            .contact-form-wrapper {
                padding: 40px 30px;
            }
            
            .contact-form-wrapper h2 {
                font-size: 1.8rem;
            }
            
            .contact-image img {
                min-height: 400px;
            }
        }
        
        @media (max-width: 480px) {
            .top-bar {
                padding: 10px 0;
                font-size: 12px;
            }
            
            .top-bar-left span,
            .phone-number {
                font-size: 11px;
            }
            
            .logo-icon {
                width: 40px;
                height: 40px;
                font-size: 1.2rem;
            }
            
            .logo span {
                font-size: 1rem;
            }
            
            .nav-links {
                gap: 10px;
            }
            
            .nav-links a {
                font-size: 12px;
                padding: 5px 8px;
            }
            
            .hero-title {
                font-size: 1.8rem;
            }
            
            .hero-description {
                font-size: 0.95rem;
            }
            
            .hero-btn {
                padding: 15px 30px;
                font-size: 14px;
            }
            
            .committed-content h2 {
                font-size: 1.5rem;
            }
            
            .solutions-title {
                font-size: 1.8rem;
            }
            
            .operate-title {
                font-size: 1.8rem;
            }
            
            .contact-form-wrapper {
                padding: 30px 20px;
            }
            
            .contact-form-wrapper h2 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
        @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<style>
    .custom-header {
        font-size: 2.2rem;
        color: #0766AD;
    }
</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold custom-header leading-tight">
            {{ __('Real-Time Request Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />
            </div>
        </div>
    </div>
</x-app-layout>

<footer class="footer">
    <div class="container mx-auto px-1 py-2">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="footer-left">
               
                <div class="social-links flex justify-start space-x-4">
                    <a href="https://www.facebook.com/" title="Facebook" class="social-icon facebook" target="_blank" rel="noopener noreferrer"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://twitter.com/" title="Twitter" class="social-icon twitter" target="_blank" rel="noopener noreferrer"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.youtube.com/" title="YouTube" class="social-icon youtube" target="_blank" rel="noopener noreferrer"><i class="fab fa-youtube"></i></a>
                    <a href="https://www.linkedin.com/" title="LinkedIn" class="social-icon linkedin" target="_blank" rel="noopener noreferrer"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="footer-right">
                <div class="flex flex-col items-start space-y-4">
                   <p> <a href="#" class="footer-link">Privacy Policy</a>
                    <a href="#" class="footer-link">Terms of Service</a>
                    <a href="#" class="footer-link">Contact Us</a></p>
                    <p class="text-gray-300 text-sm">
                        Powered by <a href="#" class="text-blue-400 hover:text-white transition-colors">Tech Innovators Inc.</a>
                    </p>
                     <p class="text-gray-300 text-sm mb-4">
                    © {{ date('Y') }} Real-Time Request Management. All rights reserved.
                </p>
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
    .footer {
        background-color: #0766AD;
        color: #FFF2F2;
        padding-top: 3rem;
        padding-bottom: 3rem;
        margin-top: 6rem;
        border-top: 1px solid #428BCA;
    }

    .footer p {
        font-size: 0.9rem;
        color: #FFF2F2;
        margin-bottom: 1rem;
    }

    .footer a {
        color: #FFF2F2;
        text-decoration: none;
        transition: color 0.3s ease-in-out, text-shadow 0.3s ease-in-out;
    }

    .footer a:hover {
        color: #E50FFF;
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
    }

    .footer .container {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .footer .grid {
        display: grid;
        grid-template-columns: 1fr;
    }


    .footer .social-links {
        margin-top: 1rem;
    }

    .footer .social-links a {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 2.5rem;
        height: 2.5rem;
        border-radius: 50%;
        background-color: rgba(255, 255, 255, 0.1);
        color: #FFF2F2;
        transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }

    .footer .social-links a:hover {
        background-color: #E50FFF;
        color: #FFF2F2;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
    }

    .footer .social-links a i {
        font-size: 1.2rem;
    }

    .footer-left {
        text-align: left;
    }

    .footer-right {
        text-align: left;
    }

    /* Specific styling for social media icons */
    .social-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 2.5rem;
        height: 2.5rem;
        border-radius: 50%;
        color: #fff;
        transition: background-color 0.3s ease;
        font-size: 1.2rem;
    }

    .social-icon.facebook {
        background-color: #1877f2;
    }

    .social-icon.facebook:hover {
        background-color: #1261c7;
    }

    .social-icon.twitter {
        background-color: #1da1f2;
    }

    .social-icon.twitter:hover {
        background-color: #148cd8;
    }

    .social-icon.youtube {
        background-color: #ff0000;
    }

    .social-icon.youtube:hover {
        background-color: #cc0000;
    }

    .social-icon.linkedin {
        background-color: #0077b5;
    }

    .social-icon.linkedin:hover {
        background-color: #005e91;
    }
    .footer-link{
        color: #FFF2F2;
        text-decoration: none;
        transition: color 0.3s ease-in-out, text-shadow 0.3s ease-in-out;
    }
    .footer-link:hover {
        color: #E50FFF;
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
    }

    /* Responsive adjustments for smaller screens */
    @media (max-width: 768px) {
        .footer .container {
            flex-direction: column;
        }

        .footer .grid {
            grid-template-columns: 1fr;
            gap: 2rem;
        }

        .footer-left,
        .footer-right {
            text-align: center;
        }

        .footer .social-links {
            justify-content: center;
        }
    }
</style>

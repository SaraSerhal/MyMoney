<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* security/login.html.twig */
class __TwigTemplate_54b2394a8bced68c491c7e5b7f69125c extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 40
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "security/login.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "security/login.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "security/login.html.twig", 40);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 42
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Log in!";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 44
    public function block_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 45
        echo "    ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
    <!-- Ajoutez d'autres liens vers des fichiers CSS si nécessaire -->
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 49
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 50
        echo "    <style>
        /* Ajoutez vos styles CSS ici */
        body {
            background-color: #e4e4e4;
        }
        .container {
            padding-top: 20px;
        }
        .pink-link{
            color: #FF698D;
        }
        .btn-custom {
            background-color: transparent;
            color: #FF698D;
            border-color: #FF698D;
        }

        .btn-custom:hover {
            background-color: #FF698D;
            border-color: #FF698D;
            color: white;
        }
        .btn {
            background-color: #FF698D;
            border: none;
            color: white;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            margin: 12px 2px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #FF698D;
            color: white;
        }
        .custom-button {
            background-color: #FF698D;
            border: none;
            color: white;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            margin: 20px 2px;
            cursor: pointer;
        }

        .custom-button:hover {
            background-color: #FF698D;
            color: white;
        }
        .pink-underline {
            color: #FF698D;
            text-decoration: underline;
        }
        .container form {
            margin-left: 350px;
            margin-right: 350px;
        }

    </style>

    <!-- Header -->
    <header class=\"d-flex flex-wrap align-items-center justify-content-between py-3 mb-4 border-bottom\">
        <div class=\"b-example-divider\"></div>
        <div class=\"col-md-3 mb-2 mb-md-0\">
            <a href=\"/\" class=\"d-inline-flex link-body-emphasis text-decoration-none\">
                <svg class=\"bi\" width=\"40\" height=\"32\" role=\"img\" aria-label=\"Bootstrap\"><use xlink:href=\"#bootstrap\"/></svg>
            </a>
        </div>

        <ul class=\"nav col-12 col-md-auto mb-2 justify-content-center mb-md-0\" style=\"margin-right: 70px\">
            <li><a href=\"";
        // line 122
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("home");
        echo "\" class=\"nav-link px-2 link-secondary pink-link\">Home</a></li>
            <li><a href=\"#\" class=\"nav-link px-2 pink-link\">Contact</a></li>
            <li><a href=\"#\" class=\"nav-link px-2 pink-link\">FAQs</a></li>
            <li><a href=\"#\" class=\"nav-link px-2 pink-link\" style=\"margin-right: 10px;\">About</a></li>
        </ul>

        <div class=\"col-md-3 text-end\">
            <a href=\"";
        // line 129
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
        echo "\" class=\"btn btn-outline-primary me-2 btn-custom\">Login</a>
            <a href=\"";
        // line 130
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_register");
        echo "\" class=\"btn btn-primary btn-custom\">Sign-up</a>
        </div>
    </header>

    <!-- Main Content -->
    <main class=\"col\">
        <!-- Contenu principal de votre page -->
        <div class=\"container\">
            <!-- Votre formulaire de connexion -->
            <form method=\"post\">
                ";
        // line 140
        if ((isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 140, $this->source); })())) {
            // line 141
            echo "                    <div class=\"alert alert-danger\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 141, $this->source); })()), "messageKey", [], "any", false, false, false, 141), twig_get_attribute($this->env, $this->source, (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 141, $this->source); })()), "messageData", [], "any", false, false, false, 141), "security"), "html", null, true);
            echo "</div>
                ";
        }
        // line 143
        echo "
                ";
        // line 144
        if (twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 144, $this->source); })()), "user", [], "any", false, false, false, 144)) {
            // line 145
            echo "                    <div class=\"mb-3\">
                        You are logged in as ";
            // line 146
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 146, $this->source); })()), "user", [], "any", false, false, false, 146), "userIdentifier", [], "any", false, false, false, 146), "html", null, true);
            echo ", <a href=\"";
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
            echo "\">Logout</a>
                    </div>
                ";
        }
        // line 149
        echo "
                <div class=\"container\">
                    <h1 class=\"text-center\">Welcome Back</h1>
                    <p class=\"text-center\">Discover new ways to manage your budget and reach your financial goals with ease</p>
                </div>

                <label for=\"inputEmail\">Email</label>
                <input type=\"email\" value=\"";
        // line 156
        echo twig_escape_filter($this->env, (isset($context["last_username"]) || array_key_exists("last_username", $context) ? $context["last_username"] : (function () { throw new RuntimeError('Variable "last_username" does not exist.', 156, $this->source); })()), "html", null, true);
        echo "\" name=\"email\" id=\"inputEmail\" class=\"form-control\" autocomplete=\"email\" required autofocus>
                <label for=\"inputPassword\">Password</label>
                <input type=\"password\" name=\"password\" id=\"inputPassword\" class=\"form-control\" autocomplete=\"current-password\" required>

                <input type=\"hidden\" name=\"_csrf_token\"
                       value=\"";
        // line 161
        echo twig_escape_filter($this->env, $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken("authenticate"), "html", null, true);
        echo "\">


                <button class=\"btn btn-outline-primary me-2 btn-custom\">Continue</button>

                <p>New? Sign up by clicking on this link : <a href=\"";
        // line 166
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_register");
        echo "\" class=\"pink-underline\">Here</a></p>
                <br>
                <br>
                <br>
                <br>
                <br>
            </form>
        </div>
    </main>

";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "security/login.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable()
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array (  263 => 166,  255 => 161,  247 => 156,  238 => 149,  230 => 146,  227 => 145,  225 => 144,  222 => 143,  216 => 141,  214 => 140,  201 => 130,  197 => 129,  187 => 122,  113 => 50,  103 => 49,  89 => 45,  79 => 44,  60 => 42,  37 => 40,);
    }

    public function getSourceContext()
    {
        return new Source("{#  {% extends 'base.html.twig' %}

{% block title %}Log in!{% endblock %}

{% block body %}
<form method=\"post\">
    {% if error %}
        <div class=\"alert alert-danger\">{{ error.messageKey|trans(error.messageData, 'security') }}</div>
    {% endif %}

    {% if app.user %}
        <div class=\"mb-3\">
            You are logged in as {{ app.user.userIdentifier }}, <a href=\"{{ path('app_logout') }}\">Logout</a>
        </div>
    {% endif %}

    <div class=\"container\">
        <h1 class=\"text-center\">Welcome</h1>
        <h5 class=\"text-center\">Our mission is to help you manage your budget effectively and achieve your financial goals.</h5>
    </div>
    <h1 class=\"h3 mb-3 font-weight-normal\"> Sign in :</h1>

    <label for=\"inputEmail\">Email</label>
    <input type=\"email\" value=\"{{ last_username }}\" name=\"email\" id=\"inputEmail\" class=\"form-control\" autocomplete=\"email\" required autofocus>
    <label for=\"inputPassword\">Password</label>
    <input type=\"password\" name=\"password\" id=\"inputPassword\" class=\"form-control\" autocomplete=\"current-password\" required>

    <input type=\"hidden\" name=\"_csrf_token\"
           value=\"{{ csrf_token('authenticate') }}\"
    >

    <button class=\"btn btn-lg btn-primary\" type=\"submit\">
        Sign in
    </button>
    <p>New? Sign up by clicking on this link : <a  href=\"{{ path('app_register') }}\"> Here   </a></p>

</form>
{% endblock %}  #}

{% extends 'base.html.twig' %}

{% block title %}Log in!{% endblock %}

{% block stylesheets %}
    {{ parent() }}
    <!-- Ajoutez d'autres liens vers des fichiers CSS si nécessaire -->
{% endblock %}

{% block body %}
    <style>
        /* Ajoutez vos styles CSS ici */
        body {
            background-color: #e4e4e4;
        }
        .container {
            padding-top: 20px;
        }
        .pink-link{
            color: #FF698D;
        }
        .btn-custom {
            background-color: transparent;
            color: #FF698D;
            border-color: #FF698D;
        }

        .btn-custom:hover {
            background-color: #FF698D;
            border-color: #FF698D;
            color: white;
        }
        .btn {
            background-color: #FF698D;
            border: none;
            color: white;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            margin: 12px 2px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #FF698D;
            color: white;
        }
        .custom-button {
            background-color: #FF698D;
            border: none;
            color: white;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            margin: 20px 2px;
            cursor: pointer;
        }

        .custom-button:hover {
            background-color: #FF698D;
            color: white;
        }
        .pink-underline {
            color: #FF698D;
            text-decoration: underline;
        }
        .container form {
            margin-left: 350px;
            margin-right: 350px;
        }

    </style>

    <!-- Header -->
    <header class=\"d-flex flex-wrap align-items-center justify-content-between py-3 mb-4 border-bottom\">
        <div class=\"b-example-divider\"></div>
        <div class=\"col-md-3 mb-2 mb-md-0\">
            <a href=\"/\" class=\"d-inline-flex link-body-emphasis text-decoration-none\">
                <svg class=\"bi\" width=\"40\" height=\"32\" role=\"img\" aria-label=\"Bootstrap\"><use xlink:href=\"#bootstrap\"/></svg>
            </a>
        </div>

        <ul class=\"nav col-12 col-md-auto mb-2 justify-content-center mb-md-0\" style=\"margin-right: 70px\">
            <li><a href=\"{{ path ('home') }}\" class=\"nav-link px-2 link-secondary pink-link\">Home</a></li>
            <li><a href=\"#\" class=\"nav-link px-2 pink-link\">Contact</a></li>
            <li><a href=\"#\" class=\"nav-link px-2 pink-link\">FAQs</a></li>
            <li><a href=\"#\" class=\"nav-link px-2 pink-link\" style=\"margin-right: 10px;\">About</a></li>
        </ul>

        <div class=\"col-md-3 text-end\">
            <a href=\"{{ path('app_login') }}\" class=\"btn btn-outline-primary me-2 btn-custom\">Login</a>
            <a href=\"{{ path('app_register') }}\" class=\"btn btn-primary btn-custom\">Sign-up</a>
        </div>
    </header>

    <!-- Main Content -->
    <main class=\"col\">
        <!-- Contenu principal de votre page -->
        <div class=\"container\">
            <!-- Votre formulaire de connexion -->
            <form method=\"post\">
                {% if error %}
                    <div class=\"alert alert-danger\">{{ error.messageKey|trans(error.messageData, 'security') }}</div>
                {% endif %}

                {% if app.user %}
                    <div class=\"mb-3\">
                        You are logged in as {{ app.user.userIdentifier }}, <a href=\"{{ path('app_logout') }}\">Logout</a>
                    </div>
                {% endif %}

                <div class=\"container\">
                    <h1 class=\"text-center\">Welcome Back</h1>
                    <p class=\"text-center\">Discover new ways to manage your budget and reach your financial goals with ease</p>
                </div>

                <label for=\"inputEmail\">Email</label>
                <input type=\"email\" value=\"{{ last_username }}\" name=\"email\" id=\"inputEmail\" class=\"form-control\" autocomplete=\"email\" required autofocus>
                <label for=\"inputPassword\">Password</label>
                <input type=\"password\" name=\"password\" id=\"inputPassword\" class=\"form-control\" autocomplete=\"current-password\" required>

                <input type=\"hidden\" name=\"_csrf_token\"
                       value=\"{{ csrf_token('authenticate') }}\">


                <button class=\"btn btn-outline-primary me-2 btn-custom\">Continue</button>

                <p>New? Sign up by clicking on this link : <a href=\"{{ path('app_register') }}\" class=\"pink-underline\">Here</a></p>
                <br>
                <br>
                <br>
                <br>
                <br>
            </form>
        </div>
    </main>

{% endblock %}


", "security/login.html.twig", "/Applications/MAMP/htdocs/Budget/Projet_Dev/templates/security/login.html.twig");
    }
}

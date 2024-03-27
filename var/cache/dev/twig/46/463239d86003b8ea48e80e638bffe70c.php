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

/* registration/register.html.twig */
class __TwigTemplate_b62f668b047af41911ca33f334556205 extends Template
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
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "registration/register.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "registration/register.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "registration/register.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Register";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 5
    public function block_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 6
        echo "    ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo " ";
        // line 7
        echo "
    <style>
        /* Votre CSS personnalisé */
        /* Par exemple */
        body {
            background-color: #e4e4e4;
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
            margin: 4px 2px;
            cursor: pointer;
        }

        .custom-form {
            margin-left: 90px;
            margin-right: 90px;
        }

        .custom-form {
            margin-left: 300px;
            margin-right: 300px;
        }
    </style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 51
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 52
        echo "    <header class=\"d-flex flex-wrap align-items-center justify-content-between py-3 mb-4 border-bottom\">
        <div class=\"b-example-divider\"></div>
        <div class=\"col-md-3 mb-2 mb-md-0\">
            <a href=\"/\" class=\"d-inline-flex link-body-emphasis text-decoration-none\">
                <svg class=\"bi\" width=\"40\" height=\"32\" role=\"img\" aria-label=\"Bootstrap\"><use xlink:href=\"#bootstrap\"/></svg>
            </a>
        </div>

        <ul class=\"nav col-12 col-md-auto mb-2 justify-content-center mb-md-0\" style=\"margin-right: 70px\">
            <li><a href=\"";
        // line 61
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("home");
        echo "\" class=\"nav-link px-2 link-secondary pink-link\">Home</a></li>
            <li><a href=\"#\" class=\"nav-link px-2 pink-link\">Contact</a></li>
            <li><a href=\"#\" class=\"nav-link px-2 pink-link\">FAQs</a></li>
            <li><a href=\"#\" class=\"nav-link px-2 pink-link\" style=\"margin-right: 10px;\">About</a></li>
        </ul>

        <div class=\"col-md-3 text-end\">
            <a href=\"";
        // line 68
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
        echo "\" class=\"btn btn-outline-primary me-2 btn-custom\">Login</a>
            <a href=\"";
        // line 69
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_register");
        echo "\" class=\"btn btn-primary btn-custom\">Sign-up</a>
        </div>
    </header>

    <h1 class=\"text-center\" style=\"margin-top: -20px\">Create an account</h1>

    <div class=\"custom-form\">
        <form method=\"post\">
            ";
        // line 77
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 77, $this->source); })()), "name", [], "any", false, false, false, 77), 'row', ["attr" => ["class" => "form-control"]]);
        echo "
            ";
        // line 78
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 78, $this->source); })()), "lastName", [], "any", false, false, false, 78), 'row', ["attr" => ["class" => "form-control"]]);
        echo "
            ";
        // line 79
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 79, $this->source); })()), "email", [], "any", false, false, false, 79), 'row', ["attr" => ["class" => "form-control"]]);
        echo "
            ";
        // line 80
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 80, $this->source); })()), "age", [], "any", false, false, false, 80), 'row', ["attr" => ["class" => "form-control", "min" => 0]]);
        echo "
            ";
        // line 81
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 81, $this->source); })()), "plainPassword", [], "any", false, false, false, 81), 'row', ["attr" => ["class" => "form-control"], "label" => "Password"]);
        echo "
            ";
        // line 82
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 82, $this->source); })()), "AgreeTerms", [], "any", false, false, false, 82), 'row');
        echo "
            ";
        // line 83
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 83, $this->source); })()), "_token", [], "any", false, false, false, 83), 'row');
        echo "

            <button type=\"submit\" class=\"btn\">Register</button>
        </form>
    </div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "registration/register.html.twig";
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
        return array (  215 => 83,  211 => 82,  207 => 81,  203 => 80,  199 => 79,  195 => 78,  191 => 77,  180 => 69,  176 => 68,  166 => 61,  155 => 52,  145 => 51,  93 => 7,  89 => 6,  79 => 5,  60 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Register{% endblock %}

{% block stylesheets %}
    {{ parent() }} {# Inclure d'abord les feuilles de style du parent #}

    <style>
        /* Votre CSS personnalisé */
        /* Par exemple */
        body {
            background-color: #e4e4e4;
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
            margin: 4px 2px;
            cursor: pointer;
        }

        .custom-form {
            margin-left: 90px;
            margin-right: 90px;
        }

        .custom-form {
            margin-left: 300px;
            margin-right: 300px;
        }
    </style>
{% endblock %}

{% block body %}
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

    <h1 class=\"text-center\" style=\"margin-top: -20px\">Create an account</h1>

    <div class=\"custom-form\">
        <form method=\"post\">
            {{ form_row(registrationForm.name, {'attr': {'class': 'form-control'}}) }}
            {{ form_row(registrationForm.lastName, {'attr': {'class': 'form-control'}}) }}
            {{ form_row(registrationForm.email, {'attr': {'class': 'form-control'}}) }}
            {{ form_row(registrationForm.age, {'attr': {'class': 'form-control', 'min': 0}}) }}
            {{ form_row(registrationForm.plainPassword, {'attr': {'class': 'form-control'}, 'label': 'Password'}) }}
            {{ form_row(registrationForm.AgreeTerms) }}
            {{ form_row(registrationForm._token) }}

            <button type=\"submit\" class=\"btn\">Register</button>
        </form>
    </div>
{% endblock %}
", "registration/register.html.twig", "/Applications/MAMP/htdocs/Budget/Projet_Dev/templates/registration/register.html.twig");
    }
}

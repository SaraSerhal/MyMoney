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

/* profile/useraccount.html.twig */
class __TwigTemplate_b452887ab01e00aff0b5bc2bf5c20f3e extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "profile/useraccount.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "profile/useraccount.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "profile/useraccount.html.twig", 1);
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

        echo " useraccount ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "

    <main>
        <div style=\"text-align: center; margin-top: 50px;\">
            <h1>User Account  </h1>

            <br>
            <h5> Here you can manage your account  </h5>
<br>

            <div class=\"text-center\">
                <table class=\"table\">
                    <tr>
                        <td>FirstName:</td>
                        <td>";
        // line 20
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 20, $this->source); })()), "name", [], "any", false, false, false, 20), "html", null, true);
        echo "</td>
                    </tr>
                    <tr>
                        <td>Name:</td>
                        <td>";
        // line 24
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 24, $this->source); })()), "lastName", [], "any", false, false, false, 24), "html", null, true);
        echo "</td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td>";
        // line 28
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 28, $this->source); })()), "email", [], "any", false, false, false, 28), "html", null, true);
        echo "</td>
                    </tr>
                    <tr>
                        <td>Age:</td>
                        <td>";
        // line 32
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 32, $this->source); })()), "age", [], "any", false, false, false, 32), "html", null, true);
        echo "</td>
                    </tr>
                    <tr>
                        ";
        // line 35
        if ((array_key_exists("profiles", $context) &&  !twig_test_empty((isset($context["profiles"]) || array_key_exists("profiles", $context) ? $context["profiles"] : (function () { throw new RuntimeError('Variable "profiles" does not exist.', 35, $this->source); })())))) {
            // line 36
            echo "                            <td>Profiles & Budgets:</td>
                            <td>
                                ";
            // line 38
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["profiles"]) || array_key_exists("profiles", $context) ? $context["profiles"] : (function () { throw new RuntimeError('Variable "profiles" does not exist.', 38, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["profile"]) {
                // line 39
                echo "                                    Your profile ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["profile"], "profileType", [], "any", false, false, false, 39), "html", null, true);
                echo " and your Budget ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["profile"], "profileBudget", [], "any", false, false, false, 39), "html", null, true);
                echo "<br>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['profile'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 41
            echo "                            </td>
                        ";
        } else {
            // line 43
            echo "                            <p>No profiles found</p>
                        ";
        }
        // line 45
        echo "                    </tr>
                </table>
            </div>

            <br>


            <a href=\"";
        // line 52
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
        echo "\" class=\"btn btn-danger\">Logout</a>
            <a href=\"";
        // line 53
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("budget_delete_user_and_profiles");
        echo "\" class=\"btn btn-danger\" onclick=\"return confirm('Are you sure you want to delete your account?')\">Delete Account</a>



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
        return "profile/useraccount.html.twig";
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
        return array (  173 => 53,  169 => 52,  160 => 45,  156 => 43,  152 => 41,  141 => 39,  137 => 38,  133 => 36,  131 => 35,  125 => 32,  118 => 28,  111 => 24,  104 => 20,  88 => 6,  78 => 5,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %} useraccount {% endblock %}

{% block body %}


    <main>
        <div style=\"text-align: center; margin-top: 50px;\">
            <h1>User Account  </h1>

            <br>
            <h5> Here you can manage your account  </h5>
<br>

            <div class=\"text-center\">
                <table class=\"table\">
                    <tr>
                        <td>FirstName:</td>
                        <td>{{ user.name }}</td>
                    </tr>
                    <tr>
                        <td>Name:</td>
                        <td>{{ user.lastName }}</td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td>{{ user.email }}</td>
                    </tr>
                    <tr>
                        <td>Age:</td>
                        <td>{{ user.age }}</td>
                    </tr>
                    <tr>
                        {% if profiles is defined and profiles is not empty %}
                            <td>Profiles & Budgets:</td>
                            <td>
                                {% for profile in profiles %}
                                    Your profile {{ profile.profileType }} and your Budget {{ profile.profileBudget }}<br>
                                {% endfor %}
                            </td>
                        {% else %}
                            <p>No profiles found</p>
                        {% endif %}
                    </tr>
                </table>
            </div>

            <br>


            <a href=\"{{ path('app_logout') }}\" class=\"btn btn-danger\">Logout</a>
            <a href=\"{{ path('budget_delete_user_and_profiles') }}\" class=\"btn btn-danger\" onclick=\"return confirm('Are you sure you want to delete your account?')\">Delete Account</a>



        </div>

    </main>


{% endblock %}
", "profile/useraccount.html.twig", "C:\\laragon\\www\\Projet_Dev\\templates\\profile\\useraccount.html.twig");
    }
}

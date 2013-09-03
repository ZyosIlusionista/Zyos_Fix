<?php

/* Widgets/Widgets.html */
class __TwigTemplate_d87f042aa99391e7608574d18f6e12d6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "\t\t\t\t\t\t\t";
        if (($this->getAttribute($this->getAttribute((isset($context["InfoSession"]) ? $context["InfoSession"] : null), "Matriz"), "Nombre") == "Administrador")) {
            // line 2
            echo "\t\t\t\t\t\t\t\tPendiente
\t\t\t\t\t\t\t";
        } else {
            // line 4
            echo "\t\t\t\t\t\t\t\t<ul class=\"minitiles\">
\t\t\t\t\t\t\t\t\t<li class='teal'><a href=\"";
            // line 5
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["NeuralRutasApp"]) ? $context["NeuralRutasApp"] : null), "RutaURL"), "html", null, true);
            echo "BaseGestion\" title=\"Agregar Gestión\"><i class=\"icon-inbox\"></i></a></li>
\t\t\t\t\t\t\t\t</ul>

\t\t\t\t\t\t\t\t<ul class=\"stats\">
\t\t\t\t\t\t\t\t\t<li class='lime'>
\t\t\t\t\t\t\t\t\t\t<i class=\"icon-globe\"></i>
\t\t\t\t\t\t\t\t\t\t<div class=\"details\">
\t\t\t\t\t\t\t\t\t\t\t<span class=\"big\">";
            // line 12
            echo twig_escape_filter($this->env, ((((isset($context["GestionesUsuario"]) ? $context["GestionesUsuario"] : null) >= 1)) ? ((isset($context["GestionesUsuario"]) ? $context["GestionesUsuario"] : null)) : ("Ninguno")), "html", null, true);
            echo "</span>
\t\t\t\t\t\t\t\t\t\t\t<span>Gestiones Usuario</span>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t<li class='blue'>
\t\t\t\t\t\t\t\t\t\t<i class=\"icon-globe\"></i>
\t\t\t\t\t\t\t\t\t\t<div class=\"details\">
\t\t\t\t\t\t\t\t\t\t\t<span class=\"big\">";
            // line 20
            echo twig_escape_filter($this->env, ((((isset($context["GestionesGlobales"]) ? $context["GestionesGlobales"] : null) >= 1)) ? ((isset($context["GestionesGlobales"]) ? $context["GestionesGlobales"] : null)) : ("Ninguno")), "html", null, true);
            echo "</span>
\t\t\t\t\t\t\t\t\t\t\t<span>Total de Gestiones</span>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t<li class='red'>
\t\t\t\t\t\t\t\t\t\t<i class=\"icon-eye-open\"></i>
\t\t\t\t\t\t\t\t\t\t<div class=\"details\">
\t\t\t\t\t\t\t\t\t\t\t<span class=\"big\">";
            // line 28
            echo twig_escape_filter($this->env, ((((isset($context["Seguimientos"]) ? $context["Seguimientos"] : null) >= 1)) ? ((isset($context["Seguimientos"]) ? $context["Seguimientos"] : null)) : ("Ninguno")), "html", null, true);
            echo "</span>
\t\t\t\t\t\t\t\t\t\t\t<span>Seguimientos</span>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t<li class='orange'>
\t\t\t\t\t\t\t\t\t\t<i class=\"icon-calendar\"></i>
\t\t\t\t\t\t\t\t\t\t<div class=\"details\">
\t\t\t\t\t\t\t\t\t\t\t<span class=\"big\">";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["InfoSession"]) ? $context["InfoSession"] : null), "Fecha"), "mon"), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["InfoSession"]) ? $context["InfoSession"] : null), "Fecha"), "mday"), "html", null, true);
            echo ", ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["InfoSession"]) ? $context["InfoSession"] : null), "Fecha"), "year"), "html", null, true);
            echo "</span>
\t\t\t\t\t\t\t\t\t\t\t<span>";
            // line 37
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["InfoSession"]) ? $context["InfoSession"] : null), "Fecha"), "wday"), "html", null, true);
            echo ", ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["InfoSession"]) ? $context["InfoSession"] : null), "Fecha"), "hours"), "html", null, true);
            echo ":";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["InfoSession"]) ? $context["InfoSession"] : null), "Fecha"), "minutes"), "html", null, true);
            echo ":";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["InfoSession"]) ? $context["InfoSession"] : null), "Fecha"), "seconds"), "html", null, true);
            echo "</span>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t";
        }
    }

    public function getTemplateName()
    {
        return "Widgets/Widgets.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  80 => 37,  72 => 36,  61 => 28,  50 => 20,  39 => 12,  29 => 5,  26 => 4,  22 => 2,  19 => 1,);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Audit;

class AuditController extends Controller
{
    public function __construct()
    {
        // Assurez-vous que l'utilisateur est authentifié
        $this->middleware('auth');
        // Assurez-vous que l'utilisateur a la permission de voir les audits
       
    }

    /**
     * Affiche une liste des journaux d'audit.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Récupère tous les audits avec les informations de l'utilisateur
        $audits = Audit::with('user')->orderBy('created_at', 'desc')->get();
        return view('audits.index', compact('audits'));
    }

    /**
     * Affiche les détails d'un audit spécifique.
     *
     * @param  \App\Models\Audit  $audit
     * @return \Illuminate\Http\Response
     */
    public function show(Audit $audit)
    {
        return view('audits.show', compact('audit'));
    }
}

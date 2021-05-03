@extends('errors::minimal')

@section('title', __('Prohíbido'))
@section('code', 'Error 403')
@section('message', __('El Usuario No Tiene Los Permisos Requeridos' ?: 'Prohíbido'))

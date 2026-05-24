<?php

test('login route is accessible', function () {
    $response = $this->get(route('login'));
    $response->assertStatus(200);
});

test('dashboard route is accessible', function () {
    $response = $this->get(route('dashboard'));
    $response->assertStatus(200);
});

test('appointments route is accessible', function () {
    $response = $this->get(route('appointments'));
    $response->assertStatus(200);
});

test('patients show route is accessible', function () {
    $response = $this->get(route('patients.show', 1));
    $response->assertStatus(200);
});

test('billing route is accessible', function () {
    $response = $this->get(route('billing'));
    $response->assertStatus(200);
});

@extends ('layouts.app')

@section ('content')
<template>
  <v-layout row wrap>
    <v-flex xs11 sm5>
      <v-dialog
        ref="dateDialog"
        v-model="dateModal"
        :return-value.sync="date"
        persistent
        lazy
        full-width
        width="290px"
      >
        <template v-slot:activator="{ on }">
          <v-text-field
            v-model="date"
            label="Pick a date for your reservation"
            prepend-icon="event"
            readonly
            v-on="on"
          ></v-text-field>
        </template>
        <v-date-picker
          v-model="date"
          color="green lighten-1"
          scrollable
          :min="minDate"
        >
          <v-spacer></v-spacer>
          <v-btn flat color="primary" @click="dateModal = false">Cancel</v-btn>
          <v-btn flat color="primary" @click="$refs.dateDialog.save(date)">OK</v-btn>
        </v-date-picker>
      </v-dialog>
    </v-flex>

    <v-spacer></v-spacer>
    <v-flex xs11 sm5>
      <v-dialog
        ref="timeDialog"
        v-model="timeModal"
        :return-value.sync="time"
        persistent
        lazy
        full-width
        width="290px"
      >
        <template v-slot:activator="{ on }">
          <v-text-field
            v-model="time"
            label="Pick the time arrival"
            prepend-icon="access_time"
            readonly
            v-on="on"
          ></v-text-field>
        </template>
        <v-time-picker
          color="green lighten-1"
          v-if="timeModal"
          v-model="time"
          full-width
          format="24hr"
          min="9:00"
          max="22:00"
        >
          <v-spacer></v-spacer>
          <v-btn flat color="primary" @click="timeModal = false">Cancel</v-btn>
          <v-btn flat color="primary" @click="$refs.timeDialog.save(time)">OK</v-btn>
        </v-time-picker>
      </v-dialog>
    </v-flex>

    <v-spacer></v-spacer>
    <v-flex xs11 sm2>
        <v-btn color="green lighten-1">Find me a table</v-btn>
    </v-flex>
  </v-layout>
</template>







@endsection

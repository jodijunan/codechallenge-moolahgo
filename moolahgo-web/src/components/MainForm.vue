<template>
  <div class="web main-wrapper">
    <v-dialog v-model="loading" persistent fullscreen>
      <v-container
        fill-height
        justify-space-between
        fluid
        style="background-color: rgba(30, 30, 30, 0.2);"
      >
        <v-layout row justify-center align-center>
          <v-progress-circular
            indeterminate
            :size="70"
            :width="7"
            color="primary"
          ></v-progress-circular>
        </v-layout>
      </v-container>
    </v-dialog>
    <v-dialog v-model="dialog" width="500">
      <v-card>
        <v-card-title class="headline primary lighten-2 white--text">
          Referral info
        </v-card-title>

        <v-card-text>
          <v-alert
            v-if="resp == null"
            border="right"
            colored-border
            type="error"
            elevation="2"
            class="mt-2"
          >
            Referral not found
          </v-alert>
          <v-container v-else fluid>
            <v-row>
              <v-col cols="4">
                <v-subheader>Referral Code</v-subheader>
              </v-col>
              <v-col cols="8">
                <v-text-field
                  label=""
                  v-model="resp.referral_code"
                  readonly
                ></v-text-field>
              </v-col>
            </v-row>
            <v-row>
              <v-col cols="4">
                <v-subheader>Name</v-subheader>
              </v-col>
              <v-col cols="8">
                <v-text-field
                  label=""
                  v-model="resp.name"
                  readonly
                ></v-text-field>
              </v-col>
            </v-row>
          </v-container>
        </v-card-text>

        <v-divider></v-divider>

        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn
            color="primary"
            text
            @click="dialog = false"
            :loading="loading"
          >
            Close
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
    <v-card
      :loading="loading"
      class="mx-auto my-12"
      max-width="374"
      color="#385F73"
      dark
    >
      <validation-observer ref="observer" v-slot="{ invalid }">
        <template slot="progress">
          <v-progress-linear
            color="deep-purple"
            height="10"
            indeterminate
          ></v-progress-linear>
        </template>

        <v-card-title>Referral Information</v-card-title>

        <v-divider class="mx-4"></v-divider>

        <v-card-text>
          <v-container>
            <v-row justify="space-between">
              <v-col cols="12" md="4">
                <v-form ref="form">
                  <validation-provider
                    v-slot="{ errors }"
                    name="Refferal Code"
                    rules="required|alpha_num|max:6|min:6"
                  >
                    <v-text-field
                      v-model="referralCode"
                      :counter="6"
                      :error-messages="errors"
                      label="Referral Code"
                      @keyup="uppercase"
                      required
                    ></v-text-field>
                  </validation-provider>
                </v-form>
              </v-col>
            </v-row>
          </v-container>
        </v-card-text>

        <v-card-actions>
          <v-btn
            class="white--text"
            color="purple darken-2"
            elevation="2"
            @click="submit"
            :disabled="invalid"
          >
            Submit
          </v-btn>
        </v-card-actions>
      </validation-observer>
    </v-card>
  </div>
</template>
<script>
import axios from "axios";
import { required, alpha_num, max, min } from "vee-validate/dist/rules";
import { extend, ValidationObserver, ValidationProvider } from "vee-validate";

extend("required", {
  ...required,
  message: "{_field_} can not be empty",
});

extend("max", {
  ...max,
  message: "{_field_} may not be greater than {length} characters",
});

extend("min", {
  ...min,
  message: "{_field_} may not be less than {length} characters",
});

extend("alpha_num", {
  ...alpha_num,
  message: "{_field_} only contain alphanumeric",
});

export default {
  name: "MainForm",
  components: {
    ValidationProvider,
    ValidationObserver,
  },
  data: () => ({
    referralCode: "",
    dialog: false,
    resp: null,
    loading: false,
  }),
  methods: {
    submit() {
      this.loading = true;
      setTimeout(() => this.getReferralInfo(), 1000);
    },

    uppercase() {
      this.referralCode = this.referralCode.toUpperCase();
    },

    async getReferralInfo() {
      this.$refs.observer.validate();
      axios
        .post("http://localhost:8000/api/process", {
          refferal_code: this.referralCode,
        })
        .then((response) => {
          console.log(response);
          this.dialog = true;
          if (response.data.data != null) {
            this.resp = response.data.data;
          } else {
            this.resp = null;
          }
        })
        .catch((error) => {
          console.log(error);
          this.errored = true;
        })
        .finally(() => (this.loading = false));
    },
  },
};
</script>

import js from "@eslint/js";
import globals from "globals";
import pluginReact from "eslint-plugin-react";
import { defineConfig } from "eslint/config";
import eslintConfigPrettier from "eslint-config-prettier/flat";
import eslintPluginPrettier from "eslint-plugin-prettier/recommended";

export default defineConfig([
    {
        files: ["**/*.{js,mjs,cjs,jsx}"],
        plugins: { js, pluginReact },
        extends: ["js/recommended"],
        languageOptions: {
            ...pluginReact.configs.flat.recommended.languageOptions,
            globals: globals.browser,
            parserOptions: {
                ecmaFeatures: {
                    jsx: true,
                },
            },
        },
        settings: {
            react: {
                version: "detect",
            },
        },
        rules: {
            "react/jsx-uses-react": "error",
            "react/jsx-uses-vars": "error",
        },
    },
    pluginReact.configs.flat.recommended,
    pluginReact.configs.flat["jsx-runtime"],
    eslintConfigPrettier,
    eslintPluginPrettier,
]);
